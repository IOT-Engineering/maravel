<?php

use Illuminate\Foundation\Inspiring;
use Modules\Ftp\Http\Controllers\FtpController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('upload-check', function () {
    FtpController::uploadCheck();
})->describe('Check the uploads of ftp users (each 10 minuts)');

Artisan::command('db-import', function () {
    FtpController::dbImport();
})->describe('Import de database to local SQL Server (each minut)');

Artisan::command('import-check', function () {
    FtpController::importCheck();
})->describe('Send mail if fail (at 23:55)');

Artisan::command('test-api', function () {
    (new Modules\DataDump\Http\Controllers\DataDumpController)->loop();
})->describe('Consultas de accesos');

Artisan::command('test-email', function () {
    $emails = array();
    array_push($emails, 'informatica@fitnesskpi.com');
    FtpController::sendEmail($emails, 'corruptedDb');
})->describe('Probando emails');