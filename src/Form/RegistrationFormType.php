<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName',
                null,
                [
                    'label' => 'Prénom',
                    'attr' => [
                        'placeholder' => 'Saisir votre prénom',
                        'class' => 'form-control',
                        'required' => true,
                    ],
                ])
            ->add('lastName',
                null,
                [
                    'label' => 'Nom',
                    'attr' => [
                        'placeholder' => 'Saisir votre nom',
                        'class' => 'form-control',
                        'required' => true,
                    ],
                ])
            ->add('email', EmailType::class,
                [
                    'label' => 'Email',
                    'attr' => [
                        'placeholder' => 'example@domain.com',
                        'class' => 'form-control',
                        'required' => true,
                    ],
                ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères

',
                        // max length allowed by Symfony for security reasons
                        'max' => 10,
                        'maxMessage' => 'Votre mot de passe doit comporter au maximun {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Accepter nos conditions générales d\'utilisation',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions pour poursuivre.',
                    ]),
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ],
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'registration_form',
        ]);
    }
}
