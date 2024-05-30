<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, [
                'attr' => ['autofocus' => true],
                'label' => 'Votre adresse email :',
            ])
            ->add('subject', ChoiceType::class, [
                'choices' => [
                    'Choisissez un sujet' => '',
                    'Demande de renseignements' => 'Demande de renseignements',
                    'Signaler un bug' => 'Signaler un bug',
                    'Proposer une amélioration' => 'Proposer une amélioration',
                    'Autres' => 'Autres',
                ],
                'attr' => ['autofocus' => true],
                'label' => 'Sujet du message :',
            ])
            ->add('content', TextareaType::class, [
                'attr' => ['rows' => 4],
                'label' => 'Votre message:',
            ])
            ->add('Envoyer', SubmitType::class,
                ['attr' => ['class' => 'btn btn-success text-center p-2 ',
                    'style' => 'margin: 10px auto; width: 35%; high: 50px;',
                ],
                    'label' => 'Envoyer',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
