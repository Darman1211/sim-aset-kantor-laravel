<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Asset extends Model
{
    use HasFactory;
    // use Sluggable;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function borrowassets()
    {
        return $this->hasMany(BorrowAsset::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function damagedassets()
    {
        return $this->hasMany(DamagedAsset::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'nama'
    //         ]
    //     ];
    // }
}
