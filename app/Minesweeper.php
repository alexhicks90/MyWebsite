<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minesweeper extends Model
{
    protected $fillable = ['height', 'width', 'mines'];
    
}