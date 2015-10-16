<?php
namespace AppBundle\Controller;

use AppBundle\Entity\TrMovie;
use AppBundle\Entity\TrWord;
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
        $repo = $this->getDoctrine()->getRepository(TrWord::class);

//        $movies = $repo->findAll();

        $words = $repo->findAll();

        return new PlainResponse();
    }
}
