<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorites extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'favorites';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function event () {
        return $this->belongsTo('App\Models\Events', 'event_id');
    }
    function user () {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }
}
