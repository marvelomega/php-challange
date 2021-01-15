<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Person;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::with('phone')->get();
        return $person;
    }

    public function show($id){
        $person = Person::with('phone')->where('id','=',$id)->get();
        return $person;
    }

}
