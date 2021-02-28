<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BidMaster;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        $bids = BidMaster::latest()->get();
        return response()->json($bids);
    }
}
