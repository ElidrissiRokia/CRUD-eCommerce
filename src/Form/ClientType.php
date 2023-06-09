<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Adresse;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('email')
            ->add('mot_de_passe')
            
            ->add('adresse', EntityType::class, [
                'class' => Adresse::class,
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getRue() . ', ' . $adresse->getCodePostal() . ', ' . $adresse->getVille() . ', ' . $adresse->getPays();
                },
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
