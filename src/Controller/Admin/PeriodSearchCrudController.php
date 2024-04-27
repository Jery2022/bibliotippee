<?php

namespace App\Controller\Admin;

use App\Entity\PeriodSearch;
use Doctrine\ORM\Mapping\Id;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PeriodSearchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PeriodSearch::class;
    }

    public function configureCrud(Crud $crud): Crud
        {
            return $crud
                ->setEntityLabelInSingular('une période')
                ->setEntityLabelInPlural('Liste des périodes')
                ->setDefaultSort(['id' => 'ASC'])
                ->setPageTitle('index', 'Liste des périodes')
                ->setPageTitle('edit', 'Modifier une période')
                ->setPageTitle('new', 'Ajouter une période')
                ->setPaginatorPageSize(5);
        }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id', 'ID')
            ->onlyOnIndex();
        yield TextField::new('period', 'Période')
            ->setHelp('Exemple: Moins d\'un (1) mois', 'Exemple: Moins d\'un (1) an', 'Exemple: Moins de cinq (5) ans');
     
    }
}
