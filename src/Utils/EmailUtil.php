<?php

namespace App\Utils;

use App\Entity\Client;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * User utility class.
 */
class EmailUtil
{
    /**
     * Creates the string to be sent in the email, according the client data.
     *
     * @param Client $client
     * @return string
     */
    public static function createTextFromContact(Client $client): string
    {
        $text = '<ul><li>Name: '. $client->getName() .' </li><li>Last Name: '. $client->getLastName() .'</li></ul>';
        return $text;
    }

    /**
     * Sends the email.
     *
     * @param MailerInterface $mailer
     * @param Client $client
     * @return void
     */
    public static function sendEmail(MailerInterface $mailer, Client $client): void
    {
        $text = self::createTextFromContact($client);

        $email = (new Email())
            ->from('hello@example.com')
            ->to($client->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('New Contact')
            ->text($text)
            ->html($text);

        $mailer->send($email);
    }
}