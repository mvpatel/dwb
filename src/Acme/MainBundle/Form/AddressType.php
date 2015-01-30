<?php

namespace Acme\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('line1','text', array(
                'attr' => array('placeholder' => 'Address Line 1'),
                'label' => 'Address Line 1',
            ))
            ->add('line2','text', array(
                'attr' => array('placeholder' => 'Address Line 2'),
                'label' => 'Address Line 2',
            ))
            ->add('line3','text', array(
                'attr' => array('placeholder' => 'Address Line 3'),
                'label' => 'Address Line 3',
            ))
            ->add('city','text', array(
                'attr' => array('placeholder' => 'City'),
                'label' => 'Address Line 1',
            ))
            ->add('postcode','text', array(
                'attr' => array('placeholder' => 'Postcode'),
            ))
            ->add('state','text', array(
                'attr' => array('placeholder' => 'State'),
            ))
            ->add('country','country')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\MainBundle\Entity\Address'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_mainbundle_address';
    }
}
