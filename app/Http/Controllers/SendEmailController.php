<?php

namespace App\Http\Controllers;

use App\Traits\CertificatTrait;
use App\Traits\SendEmailTrait;

class SendEmailController extends Controller
{
    use CertificatTrait;
    use SendEmailTrait;

    public function fiveteenDays()
    {
        $certificats = $this->certificatEndDateSubTwoWeeks();

        foreach ($certificats as $item) {
            $to = $item->email->email;
            $name = $item->email->name;
        }
        $days = '15';

        return $this->sendEmail($name, $to, $days);
    }

    public function oneDay()
    {
        $certificats = $this->certificatEndDateSubOneDay();

        foreach ($certificats as $item) {
            $to = $item->email->email;
            $name = $item->email->name;
        }
        $days = '1';

        return $this->sendEmail($name, $to, $days);
    }
    
    public function now()
    {
        $certificats = $this->certificatEndDateNow();

        foreach ($certificats as $item) {
            $to = $item->email->email;
            $name = $item->email->name;
        }
        $days = '0';

        return $this->sendEmail($name, $to, $days);
    }
}
