<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCate extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'mota', 'gia', 'idcsch', 'idDM'];
    protected $primaryKey = 'id';
    protected $table = 'tbldichvu';
    public function Category()
    {
        return $this->belongsTo('App\Categories', 'idDM', 'id');
    }
    public function ResFacility()
    {
        return $this->belongsTo('App\ResFacility', 'idcsch', 'id');
    }
}
