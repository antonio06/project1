<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $hidden = ['password'];
    protected $fillable = ['name', 'surname', 'age', 'email', 'password'];
    public $timestamps = false;
}
