<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    protected $service;

    public function __construct(BlockService $blockService)
    {
        $this->service = $blockService;
    }

}
