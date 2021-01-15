<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipOrderItem extends Model
{

    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $table = 'ship_order_item';

    public $fillable = [
        'title',
        'note',
        'quantity',
        'price',
        'shiporderid',
    ];

    protected $casts = [
        'title'         => 'string',
        'note'          => 'string',
        'quantity'      => 'integer',
        'price'         => 'double',
        'shiporderid'   => 'integer',
    ];

    public static $rules = [
        'title'         => 'required',
        'note'          => 'required',
        'quantity'      => 'required',
        'price'         => 'required',
        'shiporderid'   => 'required',
    ];

    public function shiporder()
    {
        return $this->belongsTo('App\Http\Models\ShipOrder', 'shiporderid', 'id');
    }

}
