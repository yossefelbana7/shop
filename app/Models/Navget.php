<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navget extends Model
{
    protected $table = "navgets";
    protected $fillable = ['name', 'salary'];
}