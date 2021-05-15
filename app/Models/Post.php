<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function challenge(){
        return $this->belongsTo(Challenge::class);
    }

    public function challenge_progression(){
        return $this->belongsTo(Challenge_Progression::class);
    }
}
