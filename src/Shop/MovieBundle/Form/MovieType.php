<?php

namespace Shop\MovieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label' => 'Tytuł'))
            ->add('description', null, array(
                'label' => 'Opis'))
            ->add('price', null, array(
                'label' => 'Cena'))
            ->add('category', 'choice', array(
            'label' => 'Wybierz kategorie',
            'choices'   => array(
                'Polskie' => 'Polskie', 
                'Zagraniczne' => 'Zagraniczne',
                'Komedia' => 'Komedia',
                'Inne' => 'Inne'),
            'required'  => true,
        ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Shop\MovieBundle\Entity\Movie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'shop_moviebundle_movie';
    }
}
