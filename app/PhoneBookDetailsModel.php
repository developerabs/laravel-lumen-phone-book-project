<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneBookDetailsModel extends Model
{
    public $table='phone_book_details';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
