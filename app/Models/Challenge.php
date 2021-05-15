<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $table = 'challenge';

    protected $guarded =[];

    public function challengeSet(){
        return $this->belongsTo(Challenge_Set::class);
    }

    
}
