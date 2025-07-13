<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\deleteInactiveProducts;

class deleteMass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete inactive products';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deleteInactiveProducts = new deleteInactiveProducts();
        $deleteInactiveProducts->massDelete();
        return Command::SUCCESS;
    }
}
