<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'categories';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
