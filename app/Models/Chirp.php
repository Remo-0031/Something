<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    protected $table = 'chrips';

    protected $fillable = [
        'user_id','Chirp'
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
