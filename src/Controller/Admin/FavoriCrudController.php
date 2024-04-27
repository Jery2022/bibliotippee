<?php

namespace App\Controller\Admin;

use App\Entity\Favori;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class FavoriCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Favori::class;
    }

    
    public function configureCrud(Crud $crud): Crud
        {
            return $crud
                ->setEntityLabelInSingular('un favoris')
                ->setEntityLabelInPlural('Liste des favoris')
                ->setSearchFields(['createdAt'])
                ->setDefaultSort(['createdAt' => 'DESC'])
                ->setDateTimeFormat('dd/MM/yyyy - HH:mm:ss')
                ->setPageTitle('index', 'Liste des favoris')
                ->setPageTitle('edit', 'Valider un commentaire')
                ->setPageTitle('new', 'Ajouter un favoris')
                ->setPaginatorPageSize(5);
        }
 
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('users', 'ID User')
            ->setHelp('Veuillez selectionner un utilisateur.')
            ->setLabel('ID User');

        yield AssociationField::new('documents', 'ID Document')
            ->setHelp('Veuillez selectionner un document.')
            ->setLabel('ID Document');
        
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

        yield BooleanField::new('isFavoris','Status ')
                ->setHelp('Veuillez cocher pour modifier le status favori.')
                ->setLabel('Status');
    }
  
    
}
