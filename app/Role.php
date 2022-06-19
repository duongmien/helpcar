<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public $timestamps = false;
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    protected $table = 'tblrole';
    public function User()
    {
        return $this->hasMany('App\User', null, 'id');
    }
    public function ResFacility()
    {
        return $this->hasMany('App\ResFacility', null, 'id');
    }
}
