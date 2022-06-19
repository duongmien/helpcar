<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResFacility extends Model
{
    public $timestamps = false;
    protected $fillable = ['idrole', 'name', 'ngaydkkd', 'phone', 'email', 'diachi', 'idPX', 'tax_code'];
    protected $primaryKey = 'id';
    protected $table = 'tblcsch';
    public function Role()
    {
        return $this->belongsTo('App\Role', 'idrole', 'id');
    }
    public function SubDistrict()
    {
        return $this->belongsTo('App\SubDistrict', 'idX', 'id');
    }
}
