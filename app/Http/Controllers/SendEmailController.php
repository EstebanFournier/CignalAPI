<?php

/**
 * Fichier contenant les fonctionnalités de recherche d'email à envoyer en fonction
 * des dates de fin de certificat et des dates d'alertes.
 */

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

    /**
     * Cherche les certificats se terminant dans 15 jours et retourne le mail envoyer à l'utilisateur lié
     * au certificat.
     */
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

    /**
     * Cherche les certificats se terminant dans 1 jours et retourne le mail envoyer à l'utilisateur lié
     * au certificat.
     */
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

    /**
     * Cherche les certificats se terminant aujourd'hui et retourne le mail envoyer à l'utilisateur lié
     * au certificat.
     */
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

    /**
     * Cherche les alerts s'executants dans 15 jours et retourne le mail envoyer à l'utilisateur lié
     * à l'alerte.
     */
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

    /**
     * Cherche les alerts s'executants dans 1 jours et retourne le mail envoyer à l'utilisateur lié
     * à l'alerte.
     */
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

    /**
     * Cherche les alerts s'executants aujourd'hui et retourne le mail envoyer à l'utilisateur lié
     * à l'alerte.
     */
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
