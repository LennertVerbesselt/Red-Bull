<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Interests_Categories extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
