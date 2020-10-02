<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RoutejsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routejs:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update resource js routes - @alias for ziggy:generate command.';

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
        $this->info('Updating...');

        \Artisan::call('ziggy:generate "resources/js/routes.js"');

        $this->info('Updated JS Routes - resources/js/routes.js');
    }
}
