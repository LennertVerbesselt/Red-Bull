<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge_sets_Icon extends Model
{
    use HasFactory;

    

    protected $guarded =[];

    public function challengeset(){
        return $this->belongsTo(Challenge::class);
    }
}
