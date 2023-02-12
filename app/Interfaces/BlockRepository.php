<?php

namespace App\Interfaces;

interface BlockRepository
{
    public function create(array $blockDetails);
    public function update($blockId, array $newDetails);
    public function get($blockId);
    public function all();
}
