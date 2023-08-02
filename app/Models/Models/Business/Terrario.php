<?php

namespace App\Models\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrario extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "especies",
        "residents",
        "user_id"        
    ];
}
