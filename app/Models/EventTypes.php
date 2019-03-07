<?php

namespace api\Models;

use Illuminate\Database\Eloquent\Model;
use api\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTypes extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'eventTypes';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
