<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArcadeLocation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'arcade_id',
        'address',
        'city',
        'state',
        'zip',
        'thumbnail',
    ];

    public function arcade()
    {
        return $this->belongsTo(Arcade::class);
    }
}
