<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TestController extends AbstractController
{
    public function hello(): Response
    {
        $message = 'Twig is a modern template engine for PHP';

        return $this->render('test.html.twig', [
            'message' => $message,
        ]);
    }
}