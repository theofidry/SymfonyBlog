<?php

namespace Yrdif\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ContactRequestType
 *
 * @package Yrdif\BlogBundle\Form
 */
class ContactRequestType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('subject')
            ->add('content');
    }

    /**
     * Defines options for the form type that can be used in buildForm() and buildView().
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'Yrdif\BlogBundle\Entity\ContactRequest'
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'yrdif_blogbundle_contactrequest';
    }
}
