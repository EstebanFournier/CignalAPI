<?php
/**
 * Fichier de Commands permettant grâce à crontab, d'executer la recherche de certificats et d'alertes
 * à envoyer.
 */


namespace App\Console\Commands;

use Illuminate\Console\Command;
use app\Http\Controllers\SendEmailController;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to send email validity date of certificats.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $checkEmail = (new SendEmailController)->fiveteenDaysCertificat();
        $checkEmail += (new SendEmailController)->oneDayCertificat();
        $checkEmail += (new SendEmailController)->nowCertificat();
        $checkEmail = (new SendEmailController)->fiveteenDaysAlert();
        $checkEmail += (new SendEmailController)->oneDayAlert();
        $checkEmail += (new SendEmailController)->nowAlert();

        return $checkEmail;
    }
}
