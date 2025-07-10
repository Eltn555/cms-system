<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\extractData;
class ExtractProductData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extract:product-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract product data from additional column';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $extractData = new extractData();
        $extractData->massInsert();
        return Command::SUCCESS;
    }
}
