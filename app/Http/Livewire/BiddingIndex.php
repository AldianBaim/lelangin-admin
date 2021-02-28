<?php

namespace App\Http\Livewire;

use App\Models\BiddingLog;
use App\Models\BidMaster;
use App\Models\FinalBidding;
use App\Models\User;
use Livewire\Component;

class BiddingIndex extends Component
{
    public function render()
    {
        $biddings = BiddingLog::paginate(5);
        return view('livewire.bidding-index', compact('biddings'));
    }

    public function changeWinner($id)
    {
        $bid = BiddingLog::find($id);
        $user = User::find($bid->user_id);

        FinalBidding::create([
            'user_id' => $bid->user_id,
            'officer_id' => 1,
            'bid_master_id' => $bid->id,
            'end_price' => $bid->bid_price
        ]);

        BidMaster::where('id', $bid->bid_master_id)->update(['status' => 'closed']);
        BiddingLog::where('bid_master_id', $bid->bid_master_id)->delete();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'User dengan bernama ' . $user->username . ' telah terpilih sebagai pemenang',
            'timer' => 5000,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
    }
}
