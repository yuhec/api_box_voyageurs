<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
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
        return $this->belongsTo('App\Models\Addresses', 'address_id');
    }
    function mark () {
        return $this->belongsTo('App\Models\Marks', 'mark_id');
    }
    function event_type () {
        return $this->belongsTo('App\Models\EventTypes', 'event_type_id');
    }
    function activity_type () {
        return $this->belongsTo('App\Models\ActivityTypes', 'activity_type_id');
    }
}
