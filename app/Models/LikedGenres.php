<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property int|mixed|string|null user_id
 * @property mixed favgenres
 */
class LikedGenres extends Model
{
    use HasFactory;
}
