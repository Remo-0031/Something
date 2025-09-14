<?php

namespace App\Console\Commands;

use App\Models\Chirp;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class removeOldChirps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-old-chirps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will remove chirps older than a day in the database to keep the database clean.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $oneDayAgo = Carbon::now()->subDay();
            $chirps = Chirp::where('created_at', '<', $oneDayAgo)->delete();
            $count = Chirp::where('created_at', '<', $oneDayAgo)->get()->count();

            Log::info("Found $count chirps older than a day to remove.");
            Log::info('Removing chirps older than: ' . $oneDayAgo->toDateTimeString());
            Log::info("Removed $count old chirps from the database.");
            //test
        } catch (\Throwable $th) {
            Log::error('Error removing old chirps: ' . $th->getMessage());
            $this->error('An error occurred while removing old chirps. Check the logs for details.');
        }
    }
}
