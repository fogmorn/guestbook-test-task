<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entry';
    protected $fillable = ['username', 'email', 'homepage', 'text', 'tags'];
}
