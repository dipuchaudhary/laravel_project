<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class First_table extends Model
{
        protected $fillable = [
        'name', 'email', 'password',
    ];
}
