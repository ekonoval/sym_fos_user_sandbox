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
        //$repo = $this->getDoctrine()->getRepository(TrWord::class);

        /** @var TrMovie $movie */
        $movie = $repo->find(5);

        //$movie->setMovieName("Columbo ".uniqid());


//        $this->getDoctrine()->getManager()->flush();

//        $movies = $repo->findAll();

//        $words = $repo->findAll();

        return new PlainResponse();
    }

    /**
     * @Route("/tr-movie")
     */
    public function trMovie()
    {
        $movie = new TrMovie();
        $movie->setMovieName("fake movie name");

        $em = $this->getDoctrine()->getManager();

        $em->persist($movie);
        $em->flush();

        return new PlainResponse();
    }
}
