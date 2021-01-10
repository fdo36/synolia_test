<?php

namespace App\Utils;

/**
 * Header utility class.
 */
class HeaderUtil
{
    public static function getHeaderTexts($translator, $locale): Array
    {
        $translatedHome       = $translator->trans('Home',        [], 'messages', $locale);
        $translatedTwig       = $translator->trans('Twig',        [], 'messages', $locale);
        $translatedIPEntities = $translator->trans('IP entities', [], 'messages', $locale);
        $translatedContact    = $translator->trans('Contact',     [], 'messages', $locale);
        $translatedFrench     = $translator->trans('French',      [], 'messages', $locale);
        $translatedEnglish    = $translator->trans('English',     [], 'messages', $locale);

        $headerTexts = [
            'Home'           => $translatedHome,
            'Twig'           => $translatedTwig,
            'IPEntities'     => $translatedIPEntities,
            'Contact'        => $translatedContact,
            'French'         => $translatedFrench,
            'English'        => $translatedEnglish,
            'HomePath'       => $locale === 'fr' ? 'index-fr' : 'index',
            'TwigPath'       => $locale === 'fr' ? 'twig-fr' : 'twig',
            'IPEntitiesPath' => $locale === 'fr' ? 'user-index-fr' : 'user-index',
            'ContactPath'    => $locale === 'fr' ? 'contact-fr' : 'contact',
            'FrenchPath'     => 'index-fr',
            'EnglishPath'    => 'index',
        ];


        return $headerTexts;
    }

}
