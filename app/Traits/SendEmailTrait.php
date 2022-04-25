<?php

/**
 * Trait permettant l'envoi des emails.
 */

namespace App\Traits;

trait SendEmailTrait
{

    /**
     * Envoi les emails de fin de validité de certificat.
     */
    public function sendEmailCertificat($name, $to, $days)
    {
        require_once('../vendor/autoload.php');

        $credentials = \SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_APIKEY']);
        $apiInstance = new \SendinBlue\Client\Api\TransactionalEmailsApi(new \GuzzleHttp\Client(), $credentials);

        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(
            [
                'subject' => 'Fin de validité de certificat',
                'sender' =>
                [
                    'name' => 'CignalApp',
                    'email' => 'froncement_douillet.0y@icloud.com'
                ],
                'to' =>
                [
                    [
                        'name' => $name,
                        'email' => $to
                    ]
                ],
                'htmlContent' =>
                "<html>
                    <body>
                        <h1>Attention il ne vous reste que $days jours avant la fin de validité de votre certificat</h1>
                    </body>
                </html>"
            ]
        );

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
            return $result;
        } catch (\Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * Envoi les emails d'alertes.
     */
    public function sendEmailAlert($name, $to, $days)
    {
        require_once('../vendor/autoload.php');

        $credentials = \SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_APIKEY']);
        $apiInstance = new \SendinBlue\Client\Api\TransactionalEmailsApi(new \GuzzleHttp\Client(), $credentials);

        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(
            [
                'subject' => 'Alert custom',
                'sender' =>
                [
                    'name' => 'CignalApp',
                    'email' => 'froncement_douillet.0y@icloud.com'
                ],
                'to' =>
                [
                    [
                        'name' => $name,
                        'email' => $to
                    ]
                ],
                'htmlContent' =>
                "<html>
                    <body>
                        <h1>Madame, Monsieur $name,</h1>
                        <p>Votre alerte ce déclenche dans $days jours.</p>
                    </body>
                </html>"
            ]
        );

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
            return $result;
        } catch (\Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }
}
