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
        $filter->add('movieId');
    }

    protected function configureListFields(ListMapper $list)
    {
        //parent::configureListFields($list);

//        $list->addIdentifier('movieName', null, array(
//             'route' => array(
//                 'name' => 'edit'
//             )
//         ))
//         ;


        $list->add('movieId');
        //$list->addIdentifier('movieName', null, ['route' => ['name' => 'show']]);
        $list->addIdentifier('movieName');

        $list->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'delete' => array(),
                'episodes_list' => array('template' => 'AppBundle:admin:partials/movie_episodes_link.html.twig')
            )
        ));
    }


}
