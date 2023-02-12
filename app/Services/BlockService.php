<?php

namespace App\Services;

use App\Interfaces\BlockRepository;

class BlockService
{
    protected $blockRepo;

    public function __construct(BlockRepository $blockRepo)
    {
        $this->blockRepo = $blockRepo;
    }

    public function create($inputs)
    {
        $block = $this->blockRepo->create($inputs);

        return $block;
    }

}
