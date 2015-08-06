<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invitation;
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

    /**
     * @Route("/email-test")
     */
    public function emailTestAction()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('send@example.com')
            ->setTo('ekonoval@gmail.com')
            ->setBody(
                "<html><body>Test</body></html>",
                'text/html'
            )/*
                 * If you also want to include a plaintext version of the message
                ->addPart(
                    $this->renderView(
                        'Emails/registration.txt.twig',
                        array('name' => $name)
                    ),
                    'text/plain'
                )
                */
        ;

        $res = $this->get('mailer')->send($message);

//        var_dump($res);

        return new PlainResponse();
    }

    /**
     * @Route("/invitation-create")
     */
    public function invitationCreateAction()
    {
        $em = $this->getDoctrine()->getManager();

        $invitation = new Invitation();
        $invitation->setEmail('ekonoval@gmail.com');
        $invitation->send();

        $em->persist($invitation);
        $em->flush();

        return new PlainResponse();
    }
}
