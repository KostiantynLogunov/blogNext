<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id', 'user_id', 'text'];
}
