<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Document;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class DocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
         return $crud
            ->setEntityLabelInSingular('Document')
            ->setEntityLabelInPlural('Documents')
            ->setSearchFields(['title', 'author', 'fileFormat'])
            ->setDefaultSort(['id' => 'DESC', 'title' => 'ASC', 'author'=>'ASC','uploaderAuthor'=>'ASC','createdAt' => 'DESC'])
            ->setPaginatorPageSize(10);
        }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add(EntityFilter::new('comment')
        ->setFormTypeOption('value_type', Comment::class));
    }
   
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Saisir le titre :');
        yield TextField::new('author', 'Saisir l\'auteur :');
        yield TextareaField::new('description', 'Saisir la description du document :');
        yield TextField::new('filePath')->hideOnForm();
        yield TextField::new('fileFormat')->hideOnForm();
        yield TextField::new('taille')->hideOnForm();
        yield AssociationField::new('users', 'Téléchargé par :')->hideOnForm();
        yield TextField::new('filePathImageGarde', 'Télécharger le fichier :')->hideOnIndex();
        
        $createdAt = DateTimeField::new('createdAt', 'Date de création :')
        ->setFormTypeOptions([
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
            ]);

        if (Crud::PAGE_EDIT === $pageName) {
            yield $createdAt->setFormTypeOption('disabled', true);
            } else {
            yield $createdAt->hideOnForm();
           }

        $isPublished = BooleanField::new('isPublished', 'Voulez-vous le publié ?')->renderAsSwitch();
            
        if ($isPublished===false && Crud::PAGE_EDIT === $pageName) {
                $publishedAt = DateTimeField::new('publishedAt', 'Date de publication :')
                     ->setFormTypeOptions([
                        'years' => range(date('Y'), date('Y') + 5),
                        'widget' => 'single_text',
                    ]);

                yield $publishedAt->setFormTypeOption('disabled', true);
        } else {
                yield DateTimeField::new('publishedAt', 'Date de publication :')
                    ->setFormTypeOptions([
                       'years' => range(date('Y'), date('Y') + 5),
                       'widget' => 'single_text',
                   ])->hideOnForm();
            }  
   
           
       // yield TextField::new('publishedAt')->hideOnForm();
    }
   
}
