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

    public function totalDailyBlock($date)
    {
        $query = $this->query();

        $block = $query->where('starts_at', '<=', $date)
                            ->where('ends_at', '>=', $date)
                            ->count();

        return $block;
    }
}
