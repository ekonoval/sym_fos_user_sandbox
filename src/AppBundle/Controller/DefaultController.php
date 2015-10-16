<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EkvUser;
use AppBundle\Helpers\PlainResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

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
            $userName = $user->getUserName();
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
     * @Route("/role-add")
     */
    public function addRoleAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var EkvUser $user */
        $user = $this->getUser();

//        $user->setRoles(['ROLE_USER', 'ROLE_FAKE']);
//        $user->removeRole('ROLE_FAKE');
        $user->setRoles(['ROLE_ADMIN']);
//        $user->setLocked(false);

//        $em = $this->getDoctrine()->getManager();
//        $em->persist($user);$em->flush();

        $userManager->updateUser($user);

        return new PlainResponse();
    }

    /**
     * @Route("/check-granted")
     */
    public function checkGrantedAction()
    {
        /** @var AuthorizationChecker $securityChecker */
        $securityChecker = $this->get('security.authorization_checker');

        var_dump($securityChecker->isGranted('ROLE_ADMIN'));
        var_dump($securityChecker->isGranted('ROLE_FAKE'));
        var_dump($securityChecker->isGranted('ROLE_USER'));
    }
}
