<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SitemapController;

class UpdateSitemap extends Command
{
    protected $signature = 'sitemap:update'; // Command name
    protected $description = 'Update the sitemap daily';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = new SitemapController();
        $controller->generateSitemap(); // Call your update method

        $this->info('Sitemap updated successfully!');
    }
}
