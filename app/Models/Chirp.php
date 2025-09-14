<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chirp extends Model
{
    use SoftDeletes;

    protected $table = 'chrips';

    protected $fillable = [
        'user_id','Chirp'
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
