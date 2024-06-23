<?php

namespace App\Console\Commands;

use App\Models\Player;
use App\Models\Winner;
use Illuminate\Console\Command;

class LeaverBoard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leaverboard:winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store a new record in a winners table for the player with highest points every 5 minutes.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $collection = Player::orderBy('points', 'DESC')->orderBy('name', 'ASC')->limit(2)->get();
        $players = $collection->values();
        $player1 = $players->get(0);
        $player2 = $players->get(1);
        if($player1->points <> $player2->points) {
            $newWinner = new Winner();
            $newWinner->player_points = $player1->points;
            $player1->winners()->save($newWinner);
            echo "Winner is '".$player1->name ."'";
        } else {
            echo "Winning  is tie between '".$player1->name ."' and '". $player2->name ."'";
        }
    }
}
