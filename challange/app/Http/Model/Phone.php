<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'phone',
        'personid',
    ];

    protected $casts = [
        'id'            => 'integer',
        'phone'         => 'string',
        'personid'      => 'integer',
    ];

    public static $rules = [
        'phone'      => 'required',
        'personid' 	 => 'required',
    ];

    public function Person()
    {
        return $this->hasOne('App\Models\person', 'personid');
    }
}
