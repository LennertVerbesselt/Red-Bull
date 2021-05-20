<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge_Badge extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function challenge(){
        return $this->belongsTo(Challenge::class);
    }
}
