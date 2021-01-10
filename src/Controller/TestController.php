<?php

namespace App\Controller;

use App\Utils\HeaderUtil;
use App\Utils\UserUtil;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    /**
     * Renders the index with the specific message according if twig is true or false.
     *
     * @param boolean $twig
     * @return Response
     */
    public function helloEn(TranslatorInterface $translator, $twig): Response
    {
        try {
            UserUtil::saveVisit($this->getDoctrine());
    
            $message = $twig ? 'Twig is a modern template engine for PHP' : 'Hello Synolia';
    
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        return $this->render('index.html.twig', [
            'message'     => $message,
            'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'en')
        ]);
    }

    /**
     * Renders the index with the specific message according if twig is true or false.
     *
     * @param boolean $twig
     * @return Response
     */
    public function helloFr(TranslatorInterface $translator, $twig): Response
    {

        try {
            UserUtil::saveVisit($this->getDoctrine());
    
            $message = $twig ? 'Twig is a modern template engine for PHP' : 'Hello Synolia';
    
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        return $this->render('index.html.twig', [
            'message'     => $message,
            'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'fr')
        ]);
    }
}