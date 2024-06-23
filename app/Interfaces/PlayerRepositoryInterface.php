<?php

namespace App\Interfaces;

interface PlayerRepositoryInterface
{
    public function index($sortBy, $revBy, $search);
    public function getById($id);
    public function store(array $data);
    public function update(array $data,$id);
    public function patch(array $data,$id);
    public function delete($id);
}
