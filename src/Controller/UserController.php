<?php

namespace App\Controller;

use App\Entity\User;
use App\Utils\UserUtil;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    /**
     * Renders the user index page
     *
     * @return Response
     */
    public function index(): Response
    {
        UserUtil::saveVisit($this->getDoctrine());

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('users/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * Renders the user view page
     *
     * @param integer $id
     * @return Response
     */
    public function view($id): Response
    {
        UserUtil::saveVisit($this->getDoctrine());
        
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if (!$user) {
            return $this->render('users/index.html.twig', [
                'msg' => 'User does not exists',
            ]);
        }


        return $this->render('users/view.html.twig', [
                'user' => $user,
            ]);
        
    }
}