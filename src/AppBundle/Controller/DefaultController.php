<?php

namespace AppBundle\Controller;

use AppBundle\Helpers\PlainResponse;
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
//        echo "<h2>Index page   </h2>\n";

//        /** @var Logger $logger */
//        $logger = $this->container->get('ekv_logger');
//        $logger->info('fake');
//        $logger->warning('warn1');

        $user = $this->getUser();
        $userName = "anonymous";
        if (!is_null($user)) {
            $user->getUserName();
        }


        //return new PlainResponse("<h4>UserName: {$userName}</h4>");

        return $this->render('default/index.html.twig', ['userName' => $userName]);
    }
}
