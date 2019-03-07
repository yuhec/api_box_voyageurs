<?php

namespace api\Models;

use Illuminate\Database\Eloquent\Model;
use api\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryEvents extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'categoryEvents';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function category () {
        return $this->belongsTo('api\Models\Categories', 'category_id');
    }
    function event () {
        return $this->belongsTo('api\Models\Events', 'event_id');
    }
    function box () {
        return $this->belongsTo('api\Models\Boxes', 'box_id');
    }
}
