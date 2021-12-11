<?php

namespace App\Models;

use App\Models\ArcadeLocationGame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'developer',
        'thumbnail',
        'type',
        'multi_swipe',
    ];

    public function arcadeLocations()
    {
        return $this->hasMany(ArcadeLocationGame::class);
    }
}
