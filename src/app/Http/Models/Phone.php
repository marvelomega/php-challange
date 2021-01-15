<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $table = 'phone';

    public $fillable = [
        'phone',
        'person_id',
    ];

    protected $casts = [
        'id'            => 'integer',
        'phone'         => 'string',
        'person_id'     => 'integer',
    ];

    public static $rules = [
        'phone'      => 'required',
        'person_id'  => 'required',
    ];

    public function Person()
    {
        return $this->belongsTo('App\Http\Models\Person', 'id', 'person_id');
    }
}
