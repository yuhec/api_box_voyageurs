<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use Uuids;
    use SoftDeletes;

    public $incrementing = false;
    protected $table = 'users';
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function gender () {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }
    function photo () {
        return $this->belongsTo('App\Models\Photos', 'photo_id');
    }
    function shipping_address () {
        return $this->belongsTo('App\Models\Addresses', 'shipping_address_id');
    }
    function billing_address () {
        return $this->belongsTo('App\Models\Addresses', 'billing_address_id');
    }
}
