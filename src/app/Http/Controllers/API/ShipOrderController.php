<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\ShipOrder;

class ShipOrderController extends Controller
{

    public function index()
    {
        $person = ShipOrder::with('shipto')->with('shipitem')->with('person')->get();
        return $person;
    }

    public function show($id){
        $person = ShipOrder::with('shipto')->with('shipitem')->with('person')->where('id','=',$id)->get();
        return $person;
    }

}
