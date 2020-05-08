<?php

namespace App\Console;

use

    Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Finder\Finder;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            (new \Modules\DataDump\Http\Controllers\DataDumpController())->loop();
        })->dailyAt('06:00');

        $schedule->call(function () {
            (new \Modules\DataDump\Http\Controllers\DataDumpController())->loopPre();
        })->dailyAt('05:30');

        $schedule->command('ftp:check-upload')
            ->hourly();

        $schedule->command('ftp:import')
            ->everyMinute();

        $schedule->command('ftp:check-import')
            ->dailyAt('23:55');

        // Delete old backups
        $schedule->call(function () {

            $finder = new Finder();
            $finder->files()->in(Config::get('db-backup.path'));

            $finder->sortByName();
            $count = count($finder);
            Log::warning('Number of copies: '.$count);

            foreach ($finder as $dump) {
                $fileName = $dump->getFilename();
                if ($count > 5) {
                    $path = storage_path() . '/dumps/' . $fileName;
                    File::delete($path);
                    $count--;
                }
            };

        })->name('delete old dumps')->dailyAt('23:59');
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
