<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = 'cms';
    protected $fillable = ['title','content','meta_title','meta_description','meta_keywords'];
}
