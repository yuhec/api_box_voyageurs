<?php

namespace api\Models;

use Illuminate\Database\Eloquent\Model;
use api\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoEvents extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'photoEvents';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function photo () {
        return $this->belongsTo('api\Models\Photos', 'photo_id');
    }
    function event () {
        return $this->belongsTo('api\Models\Events', 'event_id');
    }
}
