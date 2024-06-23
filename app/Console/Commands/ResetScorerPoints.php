<?php

namespace App\Console\Commands;

use App\Models\Player;
use Illuminate\Console\Command;

class ResetScorerPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:reset-scorer-points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset all point to 0 ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // echo "...initiating command\n";
        Player::where('id', '>', 0)->update(['points' => 0]);
        echo "Command exceted successully.";
    }
}
