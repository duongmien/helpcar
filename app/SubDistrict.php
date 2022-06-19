<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    public $timestamps = false;
    protected $fillable = ['name, district_id'];
    protected $primaryKey = 'id';
    protected $table = 'tblphuongxa';
    public function District()
    {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }
    public function User()
    {
        return $this->hasMany('App\User', null, 'id');
    }
    public function ResFacility()
    {
        return $this->hasMany('App\ResFacility', null, 'id');
    }
}
