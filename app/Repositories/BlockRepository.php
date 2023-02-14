<?php

namespace App\Repositories;

use Carbon\Carbon;
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

    public function totalDailyBlock($date, $room_ids = null)
    {
        $query = $this->query();

        if($room_ids && count($room_ids))
        {
            $query = $query->whereIn('room_id', $room_ids);
        }

        $block = $query->where('starts_at', '<=', $date)
                            ->where('ends_at', '>=', $date)
                            ->count();

        return $block;
    }

    public function totalMonthlyBlock($month, $room_ids = null)
    {
        $query = $this->query();

        if($room_ids && count($room_ids))
        {
            $query = $query->whereIn('room_id', $room_ids);
        }

        $records = $query->whereMonth('starts_at', '=', $month)
                        ->whereMonth('ends_at', '=', $month)
                        ->get()->toArray();

        $blocks = 0;

        foreach($records as $record)
        {
            $blocks += Carbon::parse($record['starts_at'])->diffInDays($record['ends_at']) + 1;
        }

        return $blocks;
    }
}
