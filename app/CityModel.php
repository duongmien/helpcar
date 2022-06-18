<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    protected $table = 'tblthanhpho';
    public function District()
    {
        return $this->hasMany('App\District', null, 'id');
    }
}
