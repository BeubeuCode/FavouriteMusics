<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteSongs extends Model
{
    use HasFactory;

    protected $table = 'table_user_favourite_songs';
}
