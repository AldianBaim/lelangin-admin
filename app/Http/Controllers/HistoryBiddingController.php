<?php

namespace App\Http\Controllers;

use App\Models\FinalBidding;

class HistoryBiddingController extends Controller
{
    public function index()
    {
        $histories = FinalBidding::latest()->paginate(5);

        return view('history-bidding.index', compact('histories'));
    }
}
