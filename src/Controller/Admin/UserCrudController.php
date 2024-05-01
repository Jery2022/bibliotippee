<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Vich\UploaderBundle\Entity\File;
use Symfony\Component\Form\FormEvents;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{

    public function __construct(
        public UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un utilisateur')
            ->setEntityLabelInPlural('Liste des utilistaeurs')
            ->setSearchFields(['lastName', 'firstName', 'role'])
            ->setDefaultSort(['lastName' => 'ASC'])
            ->setDateFormat('dd/MM/yyyy')
            ->setDateTimeFormat('dd/MM/yyyy - HH:mm:ss')
            ->setTimeFormat('HH:mm:ss')
            ->setPageTitle('index', 'Liste des utilisateurs')
            ->setPageTitle('new', 'Ajouter un utilisateur')
            ->setPageTitle('edit', 'Modifier un utilisateur')
            ->setPaginatorPageSize(10)
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_EDIT, Action::INDEX)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_NEW, Action::INDEX);
    }

    public function configureFields(string $pageName): iterable
    {
        $mappingParameter = $this->getParameter('vich_uploader.mappings');
        $avatarMapping = $mappingParameter['avatar']['uri_prefix'];

        yield  IdField::new('id')->hideOnForm();
        yield  TextField::new('pseudo')
            ->setLabel('Pseudo : ')
            ->setCustomOption(TextField::OPTION_MAX_LENGTH, 20)
            ->setFormTypeOption('attr.placeholder', 'Saisir le pseudo...')
            ->setFormTypeOption('attr.pattern', '.{2,20}')
            ->setHelp('Veuillez saisir un pseudo de 2 à 20 caractères !')
            ->setRequired(false);

        yield  TextField::new('lastName')
            ->setLabel('Nom de famille: ')
            ->setCustomOption(TextField::OPTION_MAX_LENGTH, 20)
            ->setFormTypeOption('attr.placeholder', 'Saisir le nom de famille...')
            ->setFormTypeOption('attr.pattern', '.{2,20}');

        yield  TextField::new('firstName', 'Prénom')
            ->setCustomOption(TextField::OPTION_MAX_LENGTH, 20)
            ->setFormTypeOption('attr.placeholder', 'Saisir le prénom...')
            ->setFormTypeOption('attr.pattern', '.{2,20}');

        yield  EmailField::new('email', 'Email')
            ->setRequired(true)
            ->setHelp('Veuillez saisir une adresse email valide !')
            ->setCustomOption(TextField::OPTION_MAX_LENGTH, 50)
            ->setFormTypeOption('attr.placeholder', 'Saisir l\'email...')
            ->setFormTypeOption('attr.pattern', '.{2,50}');

        $password = TextField::new('password', 'Mot de passe')
            ->setFormTypeOption('attr.placeholder', 'Saisir le mot de passe...')
            ->setFormTypeOption('attr.pattern', '.{8,}')
            ->setFormTypeOption('attr.type', 'password')
            ->setHelp('Veuillez saisir un mot de passe de 8 caractères minimum !');

        if ($pageName === Crud::PAGE_EDIT) {
            yield  $password->setDisabled();
        } else {
            yield  $password;
        }

        yield  ChoiceField::new('roles', 'Rôle')
            ->renderExpanded(true)
            ->setRequired(true)
            ->setHelp('Veuillez choisir un rôle !')
            ->setFormTypeOption('attr.placeholder', 'Sélectionner un rôle...')
            ->setChoices([
                'Utilisateur' => '["ROLE_USER"]',
                'Administrateur' => '["ROLE_ADMIN"]',
                'Super Administrateur' => '["ROLE_SUPER_ADMIN"]',
            ])
            ->allowMultipleChoices()
            ->renderExpanded();

        yield ImageField::new('imageNameAvatar')
            ->setBasePath($avatarMapping)
            ->setLabel('Avatar')
            ->hideOnForm();

        $imageFileAvatar = TextareaField::new('imageFileAvatar', 'Selectionner votre Avatar')
            ->hideOnIndex()
            ->setFormType(
                VichImageType::class,
                [
                    'constraints' => [
                        new File([
                            'maxSize' => '2000k',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                            ],
                            'mimeTypesMessage' => 'Veuillez télécharger une image valide (jpeg, png) !',
                        ],)
                    ],
                ],
            );

        if ($pageName === Crud::PAGE_DETAIL) {
            yield  $imageFileAvatar->onlyWhenCreating();
        } else {
            yield  $imageFileAvatar;
        }
    }

    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    private function addPasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
    {
        return $formBuilder->addEventListener(FormEvents::POST_SUBMIT, $this->hashPassword());
    }

    private function hashPassword()
    {
        return function ($event) {
            $form = $event->getForm();
            if (!$form->isValid()) {
                return;
            }
            $password = $form->get('password')->getData();
            if ($password === null) {
                return;
            }

            $hash = $this->userPasswordHasher->hashPassword($this->getUser(), $password);
            $form->getData()->setPassword($hash);
        };
    }
}
