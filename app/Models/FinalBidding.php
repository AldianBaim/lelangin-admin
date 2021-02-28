<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BidMaster;
use App\Models\Officer;

class FinalBidding extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bidMaster()
    {
        return $this->belongsTo(BidMaster::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}
