<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArcadeLocationGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'arcade_location_id',
        'game_id',
        'cost',
    ];

    protected $with = ['payouts'];

    public function arcade_location()
    {
        return $this->belongsTo(ArcadeLocation::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function payouts()
    {
        return $this->hasMany(PlayLog::class);
    }
}
