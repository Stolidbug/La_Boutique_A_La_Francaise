<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled'=> true,
                'label'=> 'Mon adresse email'
            ])

            ->add('firstname', TextType::class,[
                'disabled'=> true,
                'label'=> 'Mon prenom'
            ])
            ->add('lastname', TextType::class,[
                'disabled'=> true,
                'label'=> 'Mon nom'
            ])
            ->add('old_password', PasswordType::class,[
                'label'=> 'Mon mot de passe actuel',
                'mapped'=>false,
                'attr'=> [
                    'placeholder'=> 'veuillez saisir votre nouveau mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'mapped' => false,
                'invalid_message'=>'Les mots de passe ne sont pas identique ',
                'label' => 'Mon nouveau mot de passe',
                'required'=> true,
                'first_options'=>['label'=>'Mon nouveau mot de passe'],
                'second_options'=>['label'=>'Merci de confirmation de votre mouveau mot de passe']
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"mettre a jour"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
