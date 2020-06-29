<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    protected $table = 'phone_book_details';
    protected $primaryKey= 'phone_id';
    public $timestamps= false;
}
