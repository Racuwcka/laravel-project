<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new UsersImport, public_path('excel/file.xlsx'));
    }
}
