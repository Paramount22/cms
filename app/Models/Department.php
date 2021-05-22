<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];


    /*Mutator*/
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }


}
