<?php

namespace Acme\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConnectedUserType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('surname')
                ->add('email')
                ->add('accessKey')
                ->add('website')
                ->add('modifiedDate')
                ->add('user', 'entity', array(
                    'class' => 'AcmeMainBundle:User',
                    'property' => 'id',
                ))
                ->add('phone', new PhoneType(), array(
                    'label' => 'Phone Details:'
                ))
                ->add('address', new AddressType(), array(
                    'label' => 'Address Details:'
                ))
//                ->add('phone', 'entity', array(
//                    'class' => 'AcmeMainBundle:Phone',
//                    'property' => 'mobile',
//                ))
//                ->add('address', 'entity', array(
//                    'class' => 'AcmeMainBundle:Address',
//                    'property' => 'line1',
//                ))
                ->add('connectedusertype', 'entity', array(
                    'class' => 'AcmeMainBundle:ConnectedUserType',
                    'property' => 'typeName',
                ))
                ->add('support', 'entity', array(
                    'class' => 'AcmeMainBundle:Support',
                    'property' => 'supportType',
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\MainBundle\Entity\ConnectedUser'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'acme_mainbundle_connecteduser';
    }

}
