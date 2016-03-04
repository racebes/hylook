<?php

namespace hylook\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuariosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text')
            ->add('email', 'email')
            ->add('usernick','text')            
            ->add('passacceso', 'repeated', array(
            		'type' => 'password',
            		'invalid_message' => 'Las dos contraseñas deben coincidir',
            		'options' => array('label' => 'Contraseña: ')
            ))
            ->add('guardar','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hylook\MainBundle\Entity\Usuarios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hylook_mainbundle_usuarios';
    }
}
