<?php

/**
 * Trait permettant la comparaison des dates et la récupérations des données nécéssaire aux emails.
 */

namespace App\Traits;

use App\Models\Alert;
use Carbon\Carbon;

trait AlertTrait
{

    /**
     * Compare la date des alertes avec la date d'aujourd'hui + 15 jours puis récupère les données des certificats liés.
     */
    public function alertEndDateSubTwoWeeks()
    {
        $today = Carbon::today();
        $today->addWeeks(2);
        return Alert::whereDate('dateAlert', $today)->get()->each(function ($item, $key) {
            $item->certificat;
        });
    }

    /**
     * Compare la date des alertes avec la date d'aujourd'hui + 1 jours puis récupère les données des certificats liés.
     */
    public function alertEndDateSubOneDay()
    {
        $today = Carbon::today();
        $today->addDays(1);
        return Alert::whereDate('dateAlert', $today)->get()->each(function ($item, $key) {
            $item->certificat;
        });
    }

    /**
     * Compare la date des alertes avec la date d'aujourd'hui puis récupère les données des certificats liés.
     */
    public function alertEndDateNow()
    {
        $today = Carbon::today();
        return Alert::whereDate('dateAlert', $today)->get()->each(function ($item, $key) {
            $item->certificat;
        });
    }
}
