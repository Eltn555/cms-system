<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MoyskladService;

class SyncStock extends Command
{
    protected $signature = 'sync:stock';
    protected $description = 'Sync stock from Moysklad every 3 hours';

    protected $moyskladService;

    public function __construct(MoyskladService $moyskladService)
    {
        parent::__construct();
        $this->moyskladService = $moyskladService;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->moyskladService->getStockReport();
        $this->info('Stock sync complete');
    }
}
