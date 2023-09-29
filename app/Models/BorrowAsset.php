<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowAsset extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
