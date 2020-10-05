<?php

namespace App\Console\Commands;

use App\Jobs\PopulateContractors as JobsPopulateContractors;
use Illuminate\Console\Command;

class PopulateContractors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:contractors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to create new contractors based on the payments table';

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
        $this->info("Starting job to create contractors. Please wait");

        // Dispatch the job to create contractors
        JobsPopulateContractors::dispatch()->onQueue('contractors');
        
        $this->info("Creating contractors. This may take a while");

        //Work the contractors queue & exit when done
        $this->call('queue:work', ['--queue' => 'contractors', '--stop-when-empty' => true]);

        $this->info("All done!");

        return 0;
    }
}
