<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ShowRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the application routes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(Artisan::call('route:list'));
    }
}
