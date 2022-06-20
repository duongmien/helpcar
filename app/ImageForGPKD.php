<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageForGPKD extends Model
{
    public $timestamps = false;
    protected $fillable = ['idcsch', 'name'];
    protected $primaryKey = 'id';
    protected $table = 'tblgpkd';
    public function ResFacility()
    {
        return $this->belongsTo('App\ResFacility', 'idcsch', 'id');
    }
}
