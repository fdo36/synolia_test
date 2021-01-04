<?php

namespace App\Utils;

use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;

/**
 * User utility class.
 */
class UserUtil
{
    /**
     * Save the user visit
     *
     * @param ManagerRegistry $doctrine
     * @return void
     */
    public static function saveVisit(ManagerRegistry $doctrine): void
    {
        $entityManager = $doctrine->getManager();

        $currentIp = $_SERVER['REMOTE_ADDR'];

        /** @var User $user */
        $user = $doctrine->getRepository(User::class)->findOneBy(['ip' => $currentIp]);

        if ($user) {
            $user->setVisitCount($user->getVisitCount() + 1);
        } else {
            $user = new User();
            $user->setIp($currentIp);
            $user->setVisitCount(0);
            $entityManager->persist($user);
        }

        $user->setLastVisit(new DateTime("now"));
        $entityManager->flush();
    }
}