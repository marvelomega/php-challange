<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{

    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $table = 'person';

    public $fillable = [
        'personname',
        'personid',
    ];

    protected $casts = [
        'personid'       => 'integer',
        'personname'     => 'string',
    ];

    public static $rules = [
        'personname'      => 'required',
        'personid'      => 'required',
    ];

    public function phone()
    {
        return $this->hasMany('App\Http\Models\Phone', 'person_id', 'id');
    }

}
