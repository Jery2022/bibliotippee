<?php

namespace App\Controller\Admin;

use App\Entity\WordSearch;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WordSearchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WordSearch::class;
    }
   
    public function configureCrud(Crud $crud): Crud
        {
            return $crud
                ->setEntityLabelInSingular('un mot clé')
                ->setEntityLabelInPlural('Liste des mots clés')
                ->setDefaultSort(['id' => 'DESC'])
                ->setPageTitle('index', 'Liste des mots clés')
                ->setPageTitle('new', 'Ajouter un mot clé')
                ->setPaginatorPageSize(5);
        }
 
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id', 'ID')
            ->onlyOnIndex();
        yield TextField::new('wordKey', 'Mot clé')
            ->setHelp('Veuillez saisir un mot clé.')
            ->setLabel('Mot clé');
    }  
   
}
