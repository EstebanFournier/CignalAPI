<?php

namespace App\Traits;

use App\Models\Alert;
use Carbon\Carbon;

trait AlertTrait
{

    /* public function alert()
    {
        return Certificat::all();
    } */

    public function alertEndDateSubTwoWeeks()
    {
        $today = Carbon::today();
        $today->addWeeks(2);
        return Alert::whereDate('dateAlert', $today)->get()->each(function ($item, $key) {
            $item->certificat;
        });
    }

    public function alertEndDateSubOneDay()
    {
        $today = Carbon::today();
        $today->addDays(1);
        return Alert::whereDate('dateAlert', $today)->get()->each(function ($item, $key) {
            $item->certificat;
        });
    }

    public function alertEndDateNow()
    {
        $today = Carbon::today();
        return Alert::whereDate('dateAlert', $today)->get()->each(function ($item, $key) {
            $item->certificat;
        });
    }
}
