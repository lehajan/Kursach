<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'trainer_id');
    }
}
