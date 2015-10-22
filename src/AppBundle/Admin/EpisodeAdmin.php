<?php
namespace AppBundle\Admin;

use AppBundle\Entity\TrEpisode;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EpisodeAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return "movie";
    }

    /**
     * Fields to be shown on create/edit forms
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
//        parent::configureFormFields($form);

        $form->add('seasonNum', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        //parent::configureDatagridFilters($filter);
        $filter->add('seasonNum');
//        $filter->add('movieId');
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
        $list->addIdentifier('seasonNum', null, ['route' => ['name' => 'show']]);
        $list->addIdentifier('episodeNum');

        $list->add('_action', 'actions', array(
            'actions' => array(
//                'show' => array(),
                'edit' => array(),
                'delete' => array(),
                'words_list' => array('template' => 'AppBundle:admin:partials/episode_words_link.html.twig')
            )
        ));
    }


    public function toString($object)
    {
        /** @var $object TrEpisode*/

        return "s{$object->getSeasonNum()} e{$object->getEpisodeNum()}";
    }


}
