<?php

namespace Yrdif\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PostType
 *
 * @package Yrdif\BlogBundle\Form
 */
class PostType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('content')
            ->add('image')
            ->add('tags')
            ->add(
                'createdAt',
                null,
                [
                    'widget'    => 'single_text',
                    'read_only' => true
                ]
            )
            ->add(
                'updatedAt',
                null,
                [
                    'widget'    => 'single_text',
                    'read_only' => true
                ]
            );
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
                'data_class' => 'Yrdif\BlogBundle\Entity\Post'
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'yrdif_blogbundle_post';
    }
}
