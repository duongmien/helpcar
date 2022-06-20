<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    protected $table = 'tbldanhmucdv';
}
