<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'roll', 
        'gpa1', 
        'gpa2', 
        'gpa3', 
        'gpa4', 
        'gpa5', 
        'ref_sub'
    ];
}
