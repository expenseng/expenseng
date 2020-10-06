<?php

namespace App\Console\Commands;

use App\Jobs\UpdateContractorType as JobsUpdateContractorType;
use Illuminate\Console\Command;

class UpdateContractorType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:contractors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will update the contractor types based on public vote';

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

        $this->info("Starting job to update all contractors. Please wait");

        JobsUpdateContractorType::dispatch()->onQueue('contractors');

        $this->info("Updating all contractors. This may take a while");

        $this->call('queue:work', ['--queue' => 'contractors', '--stop-when-empty' => true]);

        $this->info("All done!");
        
        return 0;
    }
}
