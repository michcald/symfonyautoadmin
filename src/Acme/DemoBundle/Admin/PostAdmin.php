<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Acme\DemoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Post Title'))
            ->add('published', 'datetime', array(
                'label' => 'Post Title',
                'required' => true
            ))
            ->add('authors', 'entity', array(
                'class' => 'Acme\DemoBundle\Entity\User', 
                //'property' => 'name',
                'multiple' => true
            ))
            //->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('body', 'textarea', array(
                'required' => false
            )) //if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('authors')
            ->add('published')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('published')
            ->add('authors')
        ;
    }
}