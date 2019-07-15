<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Build extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build {--pro= : Run in the production stage.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make the base commands to build the project.';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('pro') !== null) {
//        Run if the --pro added
            $this->call('config:cache');
            $this->call('key:generate');
            $this->call('route:cache');
            $this->call('view:cache');


            $this->call(' migrate:refresh', [
                '--seed' => true,
            ]);
            $this->call('passport:install');

        } else {
//        Run if the command run cleared.

            $this->call('migrate:refresh', [
                '--seed' => true,
            ]);
            $this->call('passport:install');

        }
    }
}
