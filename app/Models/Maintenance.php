<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
