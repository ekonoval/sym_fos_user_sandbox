<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="app_example")
     */
    public function appExampleAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        echo "<h2>Vasya1   </h2>\n";

        /** @var Logger $logger */
        $logger = $this->container->get('ekv_logger');
        $logger->info('fake');
        $logger->warning('warn1');

        return new Response('');
    }
}
