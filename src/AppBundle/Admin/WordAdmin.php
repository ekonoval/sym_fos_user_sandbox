<?php
namespace AppBundle\Admin;

use AppBundle\Entity\TrEpisode;
use AppBundle\Entity\TrWord;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class WordAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return "episode";
    }

    /**
     * Fields to be shown on create/edit forms
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
//        parent::configureFormFields($form);

        $form->add('wordEn', 'text');
        $form->add('wordRu', 'text');
        $form->add('isHard');
        $form->add('superHard');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        //parent::configureDatagridFilters($filter);
//        $filter->add('seasonNum');
//        $filter->add('movieId');
    }

    protected function configureListFields(ListMapper $list)
    {

        $list->add('wordId');
        $list->addIdentifier('wordEn');
        $list->addIdentifier('WordRu');

        $list->add('isHard');
        $list->add('superHard', null, ['editable' => true]);

        $list->add('_action', 'actions', array(
            'actions' => array(
//                'show' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ));
    }


    public function toString($object)
    {
        /** @var $object TrWord*/

        return "'{$object->getWordEn()}' [{$object->getWordId()}]";
    }
}
