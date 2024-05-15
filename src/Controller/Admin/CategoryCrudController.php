<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des catégories')
            ->setPageTitle('edit', 'Valider une catégorie')
            ->setPageTitle('new', 'Ajouter une catégorie')
            ->setEntityLabelInSingular('une catégorie')
            ->setEntityLabelInPlural('Liste des catégories')
            ->setDefaultSort(['intitule' => 'DESC'])
            ->setPaginatorPageSize(5);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->setLabel('ID')
                ->hideOnForm(),
            TextField::new('intitule')
                ->setLabel('Nom de la catégorie')
                ->setRequired(true)
                ->setMaxLength(150)
                ->setHelp('Le nom de la catégorie doit être unique')
                ->setFormTypeOption('attr', ['placeholder' => 'Nom de la catégorie'])
                ->setFormTypeOption('attr', ['class' => 'form-control'])
                ->setFormTypeOption('attr', ['autofocus' => 'on'])
                ->setFormTypeOption('attr', ['required' => 'required'])
            //->setFormTypeOption('attr', ['pattern' => '[a-zA-Z0-9]+'])

        ];
    }
}
