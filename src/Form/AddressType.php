<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Quel nom voulez-vous donner a votre adresse ?',
                'attr'=> [
                    'placeholder'=> 'Nommez votre adresse'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prenom ?',
                'attr'=> [
                    'placeholder'=> 'Entrez votre prenom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom?',
                'attr'=> [
                    'placeholder'=> 'Entrez votre nom'
                ]
            ])
            ->add('compagny', TextType::class, [
                'label' => 'Quel est le nom de votre societer ?',
                'required' => false,
                'attr'=> [
                    'placeholder'=> 'entrez le nom de votre societer'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Votre adresse ?',
                'attr'=> [
                    'placeholder'=> '8 rue des ...'
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Quel est votre adresse postal ?',
                'attr'=> [
                    'placeholder'=> 'Entrez votre code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Quel est votre ville ?',
                'attr'=> [
                    'placeholder'=> 'Entrez votre ville'
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Quel est votre pays ?',
                'attr'=> [
                    'placeholder'=> 'Entrez votre pays'
                ]
            ])
            ->add('phone',TelType::class, [
                'label' => 'Quel est votre numero ?',
                'attr'=> [
                    'placeholder'=> 'Entrez votre numero'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label'=> 'Valider',
                'attr'=> [
                    'class'=> 'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
