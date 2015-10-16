<?php
namespace AppBundle\Controller;

use AppBundle\Entity\TrMovie;
use AppBundle\Helpers\PlainResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/exper")
 */
class ExperController extends Controller
{
    /**
     * @Route("/tr-models")
     */
    public function trModelsTestAction()
    {
        $repo = $this->getDoctrine()->getRepository(TrMovie::class);

        $movies = $repo->findAll();

        return new PlainResponse();
    }
}
