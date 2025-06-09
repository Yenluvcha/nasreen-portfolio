<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Skill extends Model
{

    use HasFactory;
    
    protected $fillable = ['title', 'level'];

}
