<?php
// src/Acme/DemoBundle/Admin/TeamMemberAdmin.php

namespace Rockbusters\EmBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TeamMemberAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Post Title'))
            //->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('description') //if no type is specified, SonataAdminBundle tries to guess it
//->add('media', 'sonata_type_model_list', array(), array('link_parameters' => array('context' => 'location')))
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