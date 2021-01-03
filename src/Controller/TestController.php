<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    public function hello(): Response
    {
        $message = 'Hello Syniola';

        return $this->render('index.html.twig', [
            'message' => $message,
        ]);
    }

    public function twig(): Response
    {
        $message = 'Twig is a modern template engine for PHP';

        return $this->render('twig.html.twig', [
            'message' => $message,
        ]);
    }
}