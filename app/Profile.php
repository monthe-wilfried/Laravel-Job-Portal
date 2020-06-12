<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'gender',
        'date_of_birth',
        'experience',
        'biography',
        'cover_letter',
        'resume',
        'avatar',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
