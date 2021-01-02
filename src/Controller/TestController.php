<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function hello()
    {
        return new Response(
            '<html><body>Hello Synolia</body></html>'
        );
    }
}