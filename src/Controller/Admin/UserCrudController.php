<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Entity\File;

class UserCrudController extends AbstractCrudController
{
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
                ->setDecimalSeparator(',')
                ->setThousandsSeparator(' ')
                ->setPageTitle('index', 'Liste des utilisateurs')
                ->setPaginatorPageSize(10);
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
            
        yield  TextField::new('password', 'Mot de passe')
            ->setFormTypeOption('attr.placeholder', 'Saisir le mot de passe...')
            ->setFormTypeOption('attr.pattern', '.{8,}')
            ->setFormTypeOption('attr.type', 'password')
            ->setHelp('Veuillez saisir un mot de passe de 8 caractères minimum !');

        yield  ChoiceField::new('role', 'Rôle')
           ->renderExpanded(true)
            ->setRequired(true)
            ->setHelp('Veuillez choisir un rôle !')
            ->setFormTypeOption('attr.placeholder', 'Sélectionner un rôle...')
            ->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
                'Super Administrateur' => 'ROLE_SUPER_ADMIN',
            ]);
         /*  ->setFormTypeOption('choices',[
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                    'Super Administrateur' => 'ROLE_SUPER_ADMIN',
                    ]); 
        yield  TextField::new('urlAvatar', 'Avatar')
            ->setFormTypeOption('attr.placeholder', 'Saisir l\'url de l\'avatar...')
          //  ->setFormTypeOption('attr.pattern', '.{2,255}')
            ->setHelp('Veuillez saisir une url valide !')
            ->setCustomOption(TextField::OPTION_MAX_LENGTH, 255)            
            ->setFormTypeOption('attr.type', 'url')            
            ->setFormTypeOption('attr.title', 'Cliquez pour ouvrir l\'url')
            ->setFormTypeOption('attr.alt', 'Avatar')            
            ->setFormTypeOption('attr.width', '100')
            ->setFormTypeOption('attr.height', '100')            
            ->setFormTypeOption('attr.required', 'false');*/

        yield ImageField::new('imageNameAvatar')
            ->setBasePath($avatarMapping)
            ->setLabel('Avatar')
            ->hideOnForm();

        yield TextareaField::new('imageFileAvatar', 'Avatar')
            ->hideOnIndex()
            ->setFormType(VichImageType::class, 
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
    }
  
}
