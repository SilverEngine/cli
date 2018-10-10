<?php

namespace App\helper;

use Silver\Core\Model;

class extends Model
{

    protected $table = 'modelname';
    protected $primaryKey = 'id';

    protected $selectable = [];

    protected $fillable = [];

    protected $filterable = [];

    protected $includable = [];

    protected $hidden = [];

}