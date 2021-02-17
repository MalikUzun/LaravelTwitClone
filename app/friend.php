<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    protected $fillable = [
        'adder_id', 'added_id'
    ];
}
