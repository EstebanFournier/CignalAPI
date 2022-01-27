<?php

namespace App\Traits;

use App\Models\Certificat;
use Carbon\Carbon;

trait CertificatTrait
{

    public function certificat()
    {
        return Certificat::all();
    }

    public function certificatEndDateSubTwoWeeks()
    {
        $today = Carbon::today();
        $today->addWeeks(2);
        return Certificat::whereDate('endDate', $today)->get()->each(function($item, $key){
            $item->email;
        });
    }
    
    public function certificatEndDateSubOneDay()
    {
        $today = Carbon::today();
        $today->addDays(1);
        return Certificat::whereDate('endDate', $today)->get()->each(function($item, $key){
            $item->email;
        });
    }

    public function certificatEndDateNow()
    {
        $today = Carbon::today();
        return Certificat::whereDate('endDate', $today)->get()->each(function($item, $key){
            $item->email;
        });
    }

}
