<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageForCSCH extends Model
{
    public $timestamps = false;
    protected $fillable = ['idcsch', 'name'];
    protected $primaryKey = 'id';
    protected $table = 'tblimagecsch';
    public function ResFacility()
    {
        return $this->belongsTo('App\ResFacility', 'idcsch', 'id');
    }
}
