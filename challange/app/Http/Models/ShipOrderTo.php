<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipOrderTo extends Model
{

    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $table = 'ship_order_to';

    public $fillable = [
        'name',
        'address',
        'city',
        'country',
        'shiporderid',
    ];

    protected $casts = [
        'name'          => 'string',
        'address'       => 'string',
        'city'          => 'string',
        'country'       => 'string',
        'shiporderid'   => 'integer',
    ];

    public static $rules = [
        'name'          => 'required',
        'address'       => 'required',
        'city'          => 'required',
        'country'       => 'required',
        'shiporderid'   => 'required',
    ];

    public function ShipOrder()
    {
        return $this->belongsTo('App\Http\Models\ShipOrder', 'shiporderid', 'id');
    }
}
