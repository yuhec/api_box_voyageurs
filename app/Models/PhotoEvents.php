<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
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
        return $this->belongsTo('App\Models\Photos', 'photo_id');
    }
    function event () {
        return $this->belongsTo('App\Models\Events', 'event_id');
    }
}
