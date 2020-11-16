<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessTokenModel extends Model
{
    public $table='access_token';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
