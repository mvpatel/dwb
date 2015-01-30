<?php

namespace Acme\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('firstName', 'text', array(
        'attr' => array('placeholder' => 'First Name')
        ))
        ->add('middleName', 'text', array(
        'attr' => array('placeholder' => 'Middle Name')
        ))
        ->add('surname', 'text', array(
        'attr' => array('placeholder' => 'Surname')
        ))
        ->add('email', 'text', array(
        'attr' => array('placeholder' => 'Email Address')
        ))
        ->add('password', 'repeated', array(
        'type' => 'password',
        'first_options' => array('label' => 'Password'),
        'second_options' => array('label' => 'Repeat Password')))
        ->add('birthPlace', 'text', array(
                    'label_attr' => array('style' => 'clear:both'),
                    'attr' => array('placeholder' => 'Birth Place')
                ))
                ->add('favouriteCity', 'text', array(
                    'attr' => array('placeholder' => 'Your Favourite City')
                ))
//                ->add('isPublished')
//        ->add('guestService')
                ->add('modifiedDate', 'date', array(
                    'data' => new \DateTime(),
                    'attr' => array('style' => 'display:none'),
                    'label_attr' => array('style' => 'display:none')
                ))
                ->add('phone', new PhoneType(), array(
                    'label_attr' => array('style' => 'display:none')
                ))
                ->add('address', new AddressType(), array(
                    'label_attr' => array('style' => 'display:none')
                ))
//                ->add('phone', 'entity', array(
//                    'class' => 'AcmeMainBundle:Phone',
//                    'property' => 'mobile',
//                ))
//                ->add('address', 'entity', array(
//                    'class' => 'AcmeMainBundle:Address',
//                    'property' => 'line1',
//                ))
//                ->add('funeral', 'entity', array(
//                    'class' => 'AcmeMainBundle:funeral',
//                    'property' => 'funeralType',
//                ))
//                ->add('arrivalFuneral', 'entity', array(
//                    'class' => 'AcmeMainBundle:ArrivalFuneral',
//                    'property' => 'arrivalFuneralType',
//                ))
//                ->add('pallbearers', 'entity', array(
//                    'class' => 'AcmeMainBundle:Pallbearers',
//                    'property' => 'pallbearersType',
//                ))
//                ->add('casket', 'entity', array(
//                    'class' => 'AcmeMainBundle:Casket',
//                    'property' => 'casketType',
//                ))
                ->add('dob', 'date', array(
                    'label_attr' => array('style' => 'float:left'),
                    'attr' => array('style' => 'float:left'),
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\MainBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'acme_mainbundle_user';
    }

}
