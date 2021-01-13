<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    use SoftDeletes;

    protected $primaryKey = 'personid';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'personname',
    ];

    protected $casts = [
        'personid'       => 'integer',
        'personname'     => 'string',
    ];

    public static $rules = [
        'personname'      => 'required',
    ];

    
}
