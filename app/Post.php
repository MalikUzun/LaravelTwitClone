<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'creator_id', 'title', 'body','created_at','updated_at'
    ];

}
