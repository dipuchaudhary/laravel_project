<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Second extends Model
{
     protected $fillable = [
        'emp_name', 'emp_email', 'emp_type','emp_id'
    ];
}
