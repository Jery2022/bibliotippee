<?php

namespace App\Controller\Admin;

use App\Entity\Search;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SearchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Search::class;
    }

    public function configureCrud(Crud $crud): Crud
        {
            return $crud
                ->setEntityLabelInSingular('une recherche')
                ->setEntityLabelInPlural('Liste des recherches effectuées')
                ->setSearchFields(['createdAt', 'users', 'documents', 'content'])
                ->setDefaultSort(['createdAt' => 'DESC'])
                ->setDateTimeFormat('dd/MM/yyyy - HH:mm:ss')
                ->setPageTitle('index', 'Liste des recherches')
                ->setPageTitle('edit', 'Valider une recherche')
                ->setPageTitle('new', 'Ajouter une recherche')
                ->setPaginatorPageSize(5);
        }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id', 'ID')->onlyOnIndex();
        yield AssociationField::new('users', 'ID User');
        yield AssociationField::new('documents', 'ID Document');
        yield TextField::new('wordKey', 'Mots clés')
                ->setHelp('Veuillez saisir le mot clé de la recherche.')
                ->setLabel('Mot clé');
        yield TextField::new('periode', 'Période :')
                ->setHelp('Veuillez saisir la période de la recherche.')
                ->setLabel('Période');
        
        $createdAt = DateTimeField::new('createdAt')
        ->setFormTypeOptions([
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
        ])
        ->setLabel('Date de création');


        if (Crud::PAGE_EDIT === $pageName) {
                        yield $createdAt ->setFormTypeOption('disabled', true) ;
                    } else {
                        yield $createdAt;
                    }  

    }
}
