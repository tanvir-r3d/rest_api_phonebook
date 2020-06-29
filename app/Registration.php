<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'user_table';
    protected $primaryKey= 'user_id';
    public $incrementing =true;
    protected $keyType ='int';
    public $timestamps= false;
}
