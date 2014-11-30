<?php
// src/Acme/DemoBundle/Admin/EventAdmin.php

namespace Rockbusters\EmBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EventAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Event Title'))
            //->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('description', null, array('attr' => array('class' => 'ckeditor')))   
            //->add('media', 'sonata_type_model_list', array(), array('link_parameters' => array('context' => 'location')))
            ->add('teamMember', 'sonata_type_model_list', array(
            'btn_add'       => 'Add member',      //Specify a custom label
            'btn_list'      => 'button.list',     //which will be translated
            'btn_delete'    => false,             //or hide the button.
            'btn_catalogue' => 'SonataNewsBundle' //Custom translation domain for buttons
        ), array(
            'placeholder' => 'No member selected'
        ))        
            
            ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('slug')
            //->add('author')
        ;
    }
}