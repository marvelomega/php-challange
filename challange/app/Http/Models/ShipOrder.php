<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipOrder extends Model
{

    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $table = 'ship_order';

    public $fillable = [
        'orderid',
        'orderperson',
    ];

    protected $casts = [
        'orderid'       => 'integer',
        'orderperson'   => 'integer',
    ];

    public static $rules = [
        'orderid'      => 'required',
        'orderperson'  => 'required',
    ];

    public function person()
    {
        return $this->hasOne('App\Http\Models\Person', 'id', 'orderperson');
    }

    public function  shipto(){
        return $this->hasOne('App\Http\Models\ShipOrderTo', 'shiporderid','id');
    }

    public function  shipitem(){
        return $this->hasMany('App\Http\Models\ShipOrderItem', 'shiporderid','id');
    }


}
