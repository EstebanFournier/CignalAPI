<?php

namespace App\Http\Controllers;

use App\Traits\CertificatTrait;
use App\Traits\SendEmailTrait;
use App\Traits\AlertTrait;
use App\Models\Certificat;
use App\Models\Email;


class SendEmailController extends Controller
{
    use CertificatTrait;
    use SendEmailTrait;
    use AlertTrait;

    public function fiveteenDaysCertificat()
    {
        $certificats = $this->certificatEndDateSubTwoWeeks();

        foreach ($certificats as $item) {
            $to = $item->email->email;
            $name = $item->email->name;
        }
        $days = '15';

        return $this->sendEmailCertificat($name, $to, $days);
    }

    public function oneDayCertificat()
    {
        $certificats = $this->certificatEndDateSubOneDay();

        foreach ($certificats as $item) {
            $to = $item->email->email;
            $name = $item->email->name;
        }
        $days = '1';

        return $this->sendEmailCertificat($name, $to, $days);
    }

    public function nowCertificat()
    {
        $certificats = $this->certificatEndDateNow();

        foreach ($certificats as $item) {
            $to = $item->email->email;
            $name = $item->email->name;
        }
        $days = '0';

        return $this->sendEmailCertificat($name, $to, $days);
    }

    public function fiveteenDaysAlert()
    {
        $alerts = $this->alertEndDateSubTwoWeeks();

        foreach ($alerts as $certificat) {
            $id = $certificat->certificat->email_id;
            $email = Email::find($id);
            $to = $email->email;
            $name = $email->name;
        }
        $days = '15';

        return $this->sendEmailAlert($name, $to, $days);
    }

    public function oneDayAlert()
    {
        $alerts = $this->alertEndDateSubOneDay();

        foreach ($alerts as $certificat) {
            $id = $certificat->certificat->email_id;
            $email = Email::find($id);
            $to = $email->email;
            $name = $email->name;
        }
        $days = '1';

        return $this->sendEmailAlert($name, $to, $days);
    }

    public function nowAlert()
    {
        $alerts = $this->alertEndDateNow();

        foreach ($alerts as $certificat) {
            $id = $certificat->certificat->email_id;
            $email = Email::find($id);
            $to = $email->email;
            $name = $email->name;
        }
        $days = '0';

        return $this->sendEmailAlert($name, $to, $days);
    }
}
