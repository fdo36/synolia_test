<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    public function hello()
    {
        return new Response(
            '<html><body>Hello Synolia</body></html>'
        );
    }

    public function twig(): Response
    {
        $message = 'Twig is a modern template engine for PHP';

        return $this->render('test.html.twig', [
            'message' => $message,
        ]);
    }
}