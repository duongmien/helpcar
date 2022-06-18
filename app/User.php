<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = ['idrole', 'name', 'DoB', 'phone', 'email', 'CMND', 'idPX'];
    protected $primaryKey = 'id';
    protected $table = 'tbluser';
    public function Role()
    {
        return $this->belongsTo('App\Role', 'idrole', 'id');
    }
    public function SubDistrict()
    {
        return $this->belongsTo('App\SubDistrict', 'idPX', 'id');
    }
}
