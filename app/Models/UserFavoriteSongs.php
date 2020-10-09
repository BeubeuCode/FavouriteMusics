<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int|mixed|string|null user_id
 * @property mixed track_id
 * @property mixed track_name
 * @property mixed track_artist
 */
class UserFavoriteSongs extends Model
{
    use HasFactory;

    protected $table = 'table_user_favourite_songs';
}
