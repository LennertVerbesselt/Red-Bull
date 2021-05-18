<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $guarded =[];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
