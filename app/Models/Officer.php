<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;

class Officer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
