<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = ['name, city_id'];
    protected $primaryKey = 'id';
    protected $table = 'tblquanhuyen';
    public function City()
    {
        return $this->belongsTo('App\CityModel', 'city_id', 'id');
    }
    public function SubDistrict()
    {
        return $this->hasMany('App\SubDistrict', null, 'id');
    }
}
