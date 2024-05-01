<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class CommentCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un commentaire')
            ->setEntityLabelInPlural('Liste des commentaires')
            ->setSearchFields(['createdAt'])
            ->setDefaultSort(['createdAt' => 'DESC'])
            ->setDateTimeFormat('dd/MM/yyyy - HH:mm:ss')
            ->setPageTitle('index', 'Liste des commentaires')
            ->setPageTitle('edit', 'Valider un commentaire')
            ->setPageTitle('new', 'Ajouter un commentaire')
            ->setPaginatorPageSize(5);
    }



    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('users', 'ID User');
        yield AssociationField::new('documents', 'ID Document');
        yield TextareaField::new('content', 'Commentaire');


        $createdAt = DateTimeField::new('createdAt')
            ->setFormTypeOptions([
                'years' => range(date('Y'), date('Y') + 5),
                'widget' => 'single_text',
            ])
            ->setLabel('Date de création');


        if (Crud::PAGE_EDIT === $pageName) {
            yield $createdAt->setFormTypeOption('disabled', true);
        } else {
            yield $createdAt;
        }

        yield BooleanField::new('isValided', 'Status ')
            ->setHelp('Veuillez cocher pour valider ce commentaire.')
            ->setLabel('Status');

        yield ChoiceField::new('rate', 'Note')
            ->setChoices([
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ])
            ->setHelp('Veuillez selectionner une note !')
            ->setLabel('Note :')
            ->renderExpanded();
    }
}
