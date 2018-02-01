<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','category_id', 'short_text','full_text','author'];
}
