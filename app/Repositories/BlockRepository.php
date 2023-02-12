<?php

namespace App\Repositories;

use App\Models\Block;
use App\Traits\DatabaseRepositoryTrait;
use App\Interfaces\BlockRepository as BlockRepositoryInterface;

class BlockRepository implements BlockRepositoryInterface
{
    use DatabaseRepositoryTrait;
    /**
     * The model associated with the repository.
     *
     * @var \App\Models\Block
     */
    private $model = Block::class;
}
