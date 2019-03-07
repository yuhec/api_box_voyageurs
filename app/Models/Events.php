<?php

namespace api\Models;

use Illuminate\Database\Eloquent\Model;
use api\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'events';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function address () {
        return $this->belongsTo('api\Models\Addresses', 'address_id');
    }
    function mark () {
        return $this->belongsTo('api\Models\Marks', 'mark_id');
    }
    function event_type () {
        return $this->belongsTo('api\Models\EventTypes', 'event_type_id');
    }
    function activity_type () {
        return $this->belongsTo('api\Models\ActivityTypes', 'activity_type_id');
    }
}
