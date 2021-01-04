<?php

namespace App\Controller;

use App\Entity\User;
use App\Utils\UserUtil;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    /**
     * Renders the index with the specific message according if twig is true or false.
     *
     * @param boolean $twig
     * @return Response
     */
    public function hello($twig): Response
    {
        try {
            UserUtil::saveVisit($this->getDoctrine());
    
            $message = $twig ? 'Twig is a modern template engine for PHP' : 'Hello Syniola';
    
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        return $this->render('index.html.twig', [
            'message' => $message,
        ]);
    }
}