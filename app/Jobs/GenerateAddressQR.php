<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateAddressQR implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $playerDetails;
    /**
     * Create a new job instance.
     */
    public function __construct($details)
    {
        $this->playerDetails = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $player = $this->playerDetails; // Collection
        $created_at     = $player->created_at->format('Y-m-d');
        // $address_str    = str_replace(' ', '-', $player->address); // Replaces all spaces with hyphens.
        $address        = preg_replace('/[^A-Za-z0-9-.\ ,:]/', '', $player->address); // Removes special chars.
        $qr_svg         = QrCode::size(512)
                            ->color(0, 0, 255)
                            ->margin(1)
                            ->generate(
                                $address,
                            );

        $fileName       = $player->id."_".$created_at."_qr";
        $this->stocker_fichier_logo($qr_svg, $fileName, 'svg');
                    
    }

    static function stocker_fichier_logo($image, $image_chemin, $ext){
        $image_chemin = '/img/profile/'.$image_chemin;
        if($ext == "svg"){
            $res = Storage::put($image_chemin .'.svg', $image);
        } else {
            $res = Storage::put($image_chemin .'.png', $image);
        }
        $url = Storage::url("$image_chemin.$ext");
        echo "Address QR image is uploaded at $url";
    }
}
