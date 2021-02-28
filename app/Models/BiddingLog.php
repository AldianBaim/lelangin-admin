<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BidMaster;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiddingLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bidMaster()
    {
        return $this->belongsTo(BidMaster::class);
    }
}
