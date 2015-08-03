<?php

namespace AppUserBundle\Controller;

use AppBundle\Entity\EkvUser;
use FOS\UserBundle\Doctrine\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Helpers\PlainResponse;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/fos")
 */
class FosController extends Controller
{
    private function plainResponse()
    {
        return new PlainResponse();
    }
    /**
     * @Route("/", name="fos_index")
     */
    public function indexAction()
    {
        echo "<h2>Fos index</h2>\n";

        return new PlainResponse();
    }

    /**
     * @Route("/user-manager")
     */
    public function userManagerAction()
    {
        /** @var UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var EkvUser $user */
        //$user = $userManager->createUser();
        $user = $userManager->findUserByEmail('admin@admin.com');

        return $this->plainResponse();
    }
}
