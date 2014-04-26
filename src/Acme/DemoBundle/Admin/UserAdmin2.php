<?php

namespace Acme\DemoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstName', 'text', array(
                'label' => 'First name',
                'attr' => array(
                    'placeholder' => 'ciao'
                )
            ))
            ->add('lastName', 'text', array('label' => 'Last name'))
            ->add('email', 'text', array('label' => 'Email'))
            /*->add('posts', 'sonata_type_collection',
                array(
                    'required' => false,
                    'by_reference' => false
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'allow_delete' => true
                ))*/
            ->add('posts', 'sonata_type_collection', array(), array(
                'inline' => 'standard',
                'sortable'  => 'published'
            ))
            /*->add('posts', 'entity', array(
                'class' => 'Acme\DemoBundle\Entity\Post', 
                'multiple' => true,
                'required' => false,
                'read_only' => true,
                'disabled'  => true,
                'empty_value' => null,
                'attr' => array(
                    'style' => 'width:100%'
                )
            ))*/
            ->setHelps(array(
               'posts' => $this->trans('ciao ')
            ));
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstName')
            ->add('lastName')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('firstName')
            ->add('lastName')
            ->add('email')
        ;
    }
}