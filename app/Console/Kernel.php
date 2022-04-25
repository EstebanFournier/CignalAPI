<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\SendEmailController;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     * Fonction permettant l'appel des commandes dans le fichier SendEmailCommands.
     * C'est ce fichier qui est appelé par crontab.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:email')->dailyAt('01:00');
        // * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
