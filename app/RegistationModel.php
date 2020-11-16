<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistationModel extends Model
{
    public $table='registation';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
