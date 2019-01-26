<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'boxes';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function destination () {
        return $this->belongsTo('App\Models\Destinations', 'destination_id');
    }
}
