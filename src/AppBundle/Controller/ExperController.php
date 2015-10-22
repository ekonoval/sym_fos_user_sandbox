<?php
namespace AppBundle\Controller;

use AppBundle\Entity\TrEpisode;
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
    public function trMovieAction()
    {
        $movie = new TrMovie();
        $movie->setMovieName("fake movie name");

        $em = $this->getDoctrine()->getManager();

        $em->persist($movie);
        $em->flush();

        return new PlainResponse();
    }

    /**
     * @Route("/tr-episode")
     */
    public function trEpisodeAction()
    {

        $repo = $this->getDoctrine()->getRepository(TrEpisode::class);
        //$episodes = $repo->findBy(['movieId' => 5]);
        $episodes = $repo->findBy(['movieId' => 9]);

        return new PlainResponse();
    }

    /**
     * @Route("/tr-join")
     */
    public function trMovieEpisodeJoinAction()
    {

        $repo = $this->getDoctrine()->getRepository(TrEpisode::class);
        $episodes = $repo->findBy(array('movie' => 1));

        return new PlainResponse();
    }

    /**
     * @Route("/render")
     */
    public function renderAction()
    {

        //return $this->render("src/AppBundle/Resources/views/admin/partials/fake.html.twig");
        return $this->render("AppBundle:admin:partials/fake.html.twig");
//        return $this->render("AppBundle::root.html.twig");
//        return $this->render("AppBundle:fake:risk.html.twig");
    }
}
