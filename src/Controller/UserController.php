<?php

namespace App\Controller;

use App\Entity\User;
use App\Utils\HeaderUtil;
use App\Utils\UserUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;


class UserController extends AbstractController
{

    /**
     * Renders the user index page
     *
     * @return Response
     */
    public function index(TranslatorInterface $translator): Response
    {
        UserUtil::saveVisit($this->getDoctrine());

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('users/index.html.twig', [
            'users' => $users,
            'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'en')
        ]);
    }

    public function indexFr(TranslatorInterface $translator): Response
    {
        UserUtil::saveVisit($this->getDoctrine());

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('users/index.html.twig', [
            'users' => $users,
            'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'fr')
        ]);
    }

    /**
     * Renders the user view page
     *
     * @param integer $id
     * @return Response
     */
    public function view(TranslatorInterface $translator, $id): Response
    {
        UserUtil::saveVisit($this->getDoctrine());
        
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if (!$user) {
            return $this->render('users/index.html.twig', [
                'msg' => 'User does not exists',
                'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'en')
            ]);
        }


        return $this->render('users/view.html.twig', [
                'user' => $user,
                'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'en')
            ]);
        
    }

    public function viewFr(TranslatorInterface $translator, $id): Response
    {
        UserUtil::saveVisit($this->getDoctrine());
        
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if (!$user) {
            return $this->render('users/index.html.twig', [
                'msg' => 'User does not exists',
                'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'fr')
            ]);
        }


        return $this->render('users/view.html.twig', [
                'user' => $user,
                'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'fr')
            ]);
        
    }
}