<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class BidMaster extends Model
{
    protected $guarded = [];
    protected $with = ['product'];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
