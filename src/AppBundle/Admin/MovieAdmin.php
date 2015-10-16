<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MovieAdmin extends Admin
{
    /**
     * Fields to be shown on create/edit forms
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
//        parent::configureFormFields($form);

        $form->add('movieName', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        //parent::configureDatagridFilters($filter);
        $filter->add('movieName');
    }

    protected function configureListFields(ListMapper $list)
    {
        //parent::configureListFields($list);
        $list->add('movieName');
    }


}
