<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Choisissez un type de document' => '',
                    'Financiers' => '0',
                    'Passation de marchés' => '1',
                    'Sauvegarde environnementale' => '2',
                    'Sauvegarde sociale' => '3',
                    'Suivi et évaluation' => '4',
                    'Techniques' => '5',
                    'Autres' => '6',
                ],
                'attr' => ['autofocus' => true],
                'label' => 'Sujet du message :',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
