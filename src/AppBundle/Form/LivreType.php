<?php

namespace AppBundle\Form;

use     AppBundle\AppBundle;
use AppBundle\Entity\Auteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('auteur', EntityType::class,
            [
                'class'=> Auteur::class,
                'choice_label'=>'name'

            ])
            ->add('resume')
            ->add('parutiondate', DateType::class, array('widget' => 'single_text', 'format' => 'yyyy-MM-dd'))
            ->add('genre', ChoiceType::class,
                [
                    'choices' => [
                        'Roman' => 'roman',
                        'Thriller' => 'thriller',
                        'Humour de merde' => 'humour de merde',
                        'Témoignage' => 'temoignage'
                    ]
                ]
            )
            ->add('price')
            ->add('img', FileType::class)
            ->add('submit', SubmitType::class)
        ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Livre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_livre';
    }


}
