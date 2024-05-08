<?php

namespace App\Controller\Admin;

use App\Entity\Document;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class DocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un document')
            ->setEntityLabelInPlural('Liste de documents')
            ->setSearchFields(['title', 'author', 'lastName', 'firstName', 'role'])
            ->setDateFormat('dd/MM/yyyy')
            ->setDateTimeFormat('dd/MM/yyyy - HH:mm:ss')
            ->setTimeFormat('HH:mm:ss')
            ->setDecimalSeparator(',')
            ->setThousandsSeparator(' ')
            ->setPageTitle('index', 'Liste des documents')
            ->setPageTitle('new', 'Ajouter un nouveau document')
            ->setPageTitle('edit', 'Modifier un document')
            ->setDefaultSort(['id' => 'DESC', 'title' => 'ASC', 'author' => 'ASC', 'createdAt' => 'DESC'])
            ->setPaginatorPageSize(10);
    }


    public function configureFields(string $pageName): iterable
    {
        $mappingParameter = $this->getParameter('vich_uploader.mappings');
        // $documentMapping = $mappingParameter['document']['uri_prefix'];
        $pagegardeMapping = $mappingParameter['imagedocument']['uri_prefix'];

        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Saisir le titre du document :')->setLabel('Titre');
        yield TextField::new('author', 'Saisir le nom de l\'auteur :')->setLabel('Auteur');
        yield TextareaField::new('description', 'Saisir la description du document :')->setLabel('Description');

        yield ImageField::new('fileNameImageDocument', 'Photo')
            ->setBasePath($pagegardeMapping)
            ->hideOnForm();

        yield TextareaField::new('imageNameDocument', 'Nom du fichier ')
            ->hideOnIndex()
            ->setLabel('Charger un document (format pdf ou epub - taille max 5Mo) :')
            ->setFormType(
                VichImageType::class,
                [
                    'constraints' => [
                        new File([
                            'maxSize' => '10000k',
                            'mimeTypes' => [
                                'document/pdf',
                                'document/epub',
                            ],
                            'mimeTypesMessage' => 'Veuillez télécharger un document au format valide (pdf, epub) !',
                        ],)
                    ],
                ],
            );

        yield TextareaField::new('imageDocument')
            ->hideOnIndex()
            ->setLabel('Charger l\'image de la page de garde (format jpg, png ou jpeg - taille max 2Mo) :')
            ->setFormType(
                VichImageType::class,
                [
                    'constraints' => [
                        new File([
                            'maxSize' => '2000k',
                            'mimeTypes' => [
                                'document/jpg',
                                'document/png',
                                'document/jpeg'
                            ],
                            'mimeTypesMessage' => 'Veuillez télécharger une image valide (jpg, png, jpeg) !',
                        ],)
                    ],
                ],
            );

        yield AssociationField::new('users', 'Nom employé :')
            ->setFormTypeOption('disabled', false)
            ->setFormTypeOption('choice_label', 'fullName')
            ->setFormTypeOption('query_builder', function ($user) {
                return $user->createQueryBuilder('u')
                    ->orderBy('u.firstName', 'ASC');
            });

        $createdAt = DateTimeField::new('createdAt', 'Document date')
            ->setFormTypeOptions([
                'years' => range(date('Y'), date('Y') + 5),
                'widget' => 'single_text',
            ]);

        $imageCreatedAt =  $createdAt;

        $publishAt = DateTimeField::new('publishAt', 'Date de publication')
            ->setFormTypeOptions([
                'years' => range(date('Y'), date('Y') + 5),
                'widget' => 'single_text',
            ])
            ->setLabel('Date de publication :');


        if (Crud::PAGE_EDIT === $pageName) {
            yield $createdAt->setFormTypeOption('disabled', true);
            yield $imageCreatedAt->setFormTypeOption('disabled', true);
            yield $publishAt;
        } else {
            yield $createdAt;
            yield $imageCreatedAt;
            yield $publishAt;
        }



        $isPublished = BooleanField::new('isPublished', 'Status ')
            ->setHelp('Veuillez cocher pour publier le document.')
            ->setLabel('Status :');

        yield $isPublished;
    }
}
