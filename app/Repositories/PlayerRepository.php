<?php

namespace App\Repositories;

use App\Models\Player;
use App\Interfaces\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{
   /**
    * Create a new class instance.
    */
   public function __construct()
   {
      // 
   }

   public function index($sortBy, $revBy, $search)
   {
      if ($sortBy == 'name') {
         $revBy = $revBy == '' ? 'DESC' : 'ASC';
         $qry = Player::orderBy("$sortBy", "$revBy");
      }
      if ($sortBy == 'points') {
         $revBy = $revBy <> '' ? 'DESC' : 'ASC';
         $qry = Player::orderBy("$sortBy", $revBy);
      }

      if (!empty($search)) {
         $qry = Player::where('name', 'like', "$search%");
      }

      return $qry->get();
   }

   public function getById($id)
   {
      return Player::findOrFail($id);
   }

   public function store(array $data)
   {
      $data['points'] = 0;
      return Player::create($data);
   }

   public function update(array $data, $id)
   {
      return Player::whereId($id)->update($data);
   }

   public function patch(array $data, $id)
   {
      return Player::whereId($id)->update($data);
   }

   public function delete($id)
   {
      if (Player::where('id', '=', $id)->exists()) {
         Player::destroy($id);
         return true;
      } else {
         return false;
      }
   }
}
