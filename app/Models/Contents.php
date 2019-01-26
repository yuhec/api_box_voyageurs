<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'contents';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function box () {
        return $this->belongsTo('App\Models\Boxes', 'box_id');
    }
    function item () {
        return $this->belongsTo('App\Models\Items', 'item_id');
    }
}
