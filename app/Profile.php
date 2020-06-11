<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id',
        'address',
        'gender',
        'date_of_birth',
        'experience',
        'biography',
        'cover_letter',
        'resume',
        'avatar',
    ];
}
