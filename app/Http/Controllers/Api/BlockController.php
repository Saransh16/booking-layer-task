<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BlockService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Block\CreateRequest;

class BlockController extends Controller
{
    protected $service;

    public function __construct(BlockService $blockService)
    {
        $this->service = $blockService;
    }

    public function create(CreateRequest $request)
    {
        $inputs = $request->validated();

        $booking = $this->service->create($inputs);

        return response()->success($booking);
    }

}
