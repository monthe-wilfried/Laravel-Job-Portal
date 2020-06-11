<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'user_id',
        'company_id',
        'category_id',
        'title',
        'slug',
        'description',
        'position',
        'address',
        'type',
        'status',
        'deadline',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
