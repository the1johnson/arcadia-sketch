<?php

namespace App\Models;

use App\Models\ArcadeLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arcade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'currency'];

    public function locations()
    {
        return $this->hasMany(ArcadeLocation::class);
    }
}
