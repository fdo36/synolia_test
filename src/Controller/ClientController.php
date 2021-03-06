<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\Type\ClientType;
use App\Utils\EmailUtil;
use App\Utils\HeaderUtil;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class ClientController extends AbstractController
{

    /**
     * Renders the form
     *
     * @return Response
     */
    public function new(TranslatorInterface $translator, Request $request, MailerInterface $mailer): Response
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            try {
                EmailUtil::sendEmail($mailer, $client);
            } catch (Exception $e) {}

            return $this->redirectToRoute('index');
        }

        return $this->render('client/new.html.twig', [
            'form' => $form->createView(),
            'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'en')
        ]);
    }

    public function newFr(TranslatorInterface $translator, Request $request, MailerInterface $mailer): Response
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            try {
                EmailUtil::sendEmail($mailer, $client);
            } catch (Exception $e) {}

            return $this->redirectToRoute('index-fr');
        }

        return $this->render('client/new.html.twig', [
            'form' => $form->createView(),
            'headerTexts' => HeaderUtil::getHeaderTexts($translator, 'fr')
        ]);
    }

}