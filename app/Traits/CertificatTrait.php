<?php

/**
 * Trait permettant la comparaison des dates et la récupérations des données nécéssaire aux emails.
 */

namespace App\Traits;

use App\Models\Certificat;
use Carbon\Carbon;

trait CertificatTrait
{

    public function certificat()
    {
        return Certificat::all();
    }

    /**
     * Compare la date des certificats avec la date d'aujourd'hui + 15 jours puis récupère les données des emails liés.
     */
    public function certificatEndDateSubTwoWeeks()
    {
        $today = Carbon::today();
        $today->addWeeks(2);
        return Certificat::whereDate('endDate', $today)->get()->each(function ($item, $key) {
            $item->email;
        });
    }

    /**
     * Compare la date des certificats avec la date d'aujourd'hui + 1 jours puis récupère les données des emails liés.
     */
    public function certificatEndDateSubOneDay()
    {
        $today = Carbon::today();
        $today->addDays(1);
        return Certificat::whereDate('endDate', $today)->get()->each(function ($item, $key) {
            $item->email;
        });
    }

    /**
     * Compare la date des certificats avec la date d'aujourd'hui puis récupère les données des emails liés.
     */
    public function certificatEndDateNow()
    {
        $today = Carbon::today();
        return Certificat::whereDate('endDate', $today)->get()->each(function ($item, $key) {
            $item->email;
        });
    }
}
