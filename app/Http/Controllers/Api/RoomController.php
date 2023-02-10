<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRequest;

class RoomController extends Controller
{
    protected $service;

    public function __construct(RoomService $roomService)
    {
        $this->service = $roomService;
    }

    public function create(CreateRequest $request)
    {
        $inputs = $request->validated();

        $room = $this->service->create($inputs);

        return response()->success($room);
    }
}
