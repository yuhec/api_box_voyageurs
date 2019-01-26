<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyBoxes extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'myBoxes';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function user () {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }
    function box () {
        return $this->belongsTo('App\Models\Boxes', 'box_id');
    }
}
