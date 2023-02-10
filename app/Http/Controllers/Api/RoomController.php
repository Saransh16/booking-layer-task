<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(RoomService $roomService)
    {
        $this->service = $roomService;
    }

    public function create()
    {

    }
}
