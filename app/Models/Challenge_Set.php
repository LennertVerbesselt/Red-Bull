<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge_Set extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $primaryKey = 'challenge_set_id';

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
