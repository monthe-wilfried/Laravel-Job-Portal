<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        'roles',
        'status',
        'deadline',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication(){
        return DB::table('job_user')->where('user_id', Auth::id())
                                        ->where('job_id', $this->id)->exists();
    }

    public function getTitleAttribute($value){
        return Str::title($value);
    }

    public function getAddressAttribute($value){
        return Str::title($value);
    }

    public function getTypeAttribute($value){
        return ucfirst($value);
    }

    public function getPositionAttribute($value){
        return Str::title($value);
    }

}
