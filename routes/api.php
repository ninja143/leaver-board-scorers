<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/player',PlayerController::class, ['except' => ['update']]);
Route::patch('player/{id}', '\App\Http\Controllers\PlayerController@patchUpdate');
Route::put('player/{id}', '\App\Http\Controllers\PlayerController@putUpdate');
Route::get('player-by-agegroup', function(){
    $groups = DB::table('players')->selectRaw('`points` as `category`')->groupBy('points')->get()->toArray();
    // Creating a collection macro
    Collection::macro('allowedColumns', function () {
        return $this->map(function ($record) {
            return $record->only('name', 'average_age');
        });
    });
    $result = Player::get()
                ->map(function ($scorer) use ($groups) {
                    foreach($groups as $key => $breakpoint)
                    {    
                        if ($breakpoint->category == $scorer->points)
                        {
                            $scorer->category = $scorer->points;
                            break;
                        }
                    }
                    return $scorer;
                })
                ->mapToGroups(function ($scorer, $key) { return [$scorer->category => $scorer]; })
                ->map(function ($group) { return $group; })
                ->map(function($groupScoreres) {
                    $avg_age = collect($groupScoreres)->avg('age');
                    foreach($groupScoreres as $singleScorer) {  $singleScorer->average_age = $avg_age;  }
                    return collect($groupScoreres->all())->allowedColumns();
                    return $groupScoreres;
                })
                ->sortKeys();

    $response=[ 'success' => true, 'data' => $result];
    if(!empty($message)){ $response['message'] = $message; }
    return response()->json($response, 200);
});
