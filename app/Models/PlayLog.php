<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'arcade_location_game_id',
        'user_id',
        'tickets',
        'swipes',
        'jackpot',
    ];
}
