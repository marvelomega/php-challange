<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ShipOrder;
use App\Http\Models\ShipOrderTo;
use App\Http\Models\ShipOrderItem;

class ShipOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order = ShipOrder::all();

//        foreach ($order as $a){
//            dd($a->shipitem);
//        }

        return view('ship-order', with(['order'=>$order]));
    }

    public function upload(Request $request)
    {

        try{

            $arrayJson = $this->processXML($request);

            if(sizeof($arrayJson)==0){
                throw new Exception("Arquivo não pode ser processado", 1);
            }

            foreach ($arrayJson as $key => $ajs) {
                $ship = new ShipOrder([
                    "orderid"       => $ajs["orderid"],
                    "orderperson"   => $ajs["orderperson"],
                ]);

                $save = $ship->save();

                if($save==false) {
                    throw new \Exception('Erro ao Salvar!');
                }

                if(isset($ajs['shipto'])){
                    $shipto = new ShipOrderTo([
                        'name'          => $ajs['shipto']['name'],
                        'address'       => $ajs['shipto']['address'],
                        'city'          => $ajs['shipto']['city'],
                        'country'       => $ajs['shipto']['country'],
                        'shiporderid'   => $ship->id,
                    ]);

                    $saveShipto = $shipto->save();

                    if($saveShipto==false) {
                        throw new \Exception('Erro ao Salvar!');
                    }
                }

                if(isset($ajs['items'])){

                    $keys = ['title'];
                    if(array_key_exists('title', $ajs['items']['item'])){
                           $aux = $ajs['items']['item'];
                           unset($ajs['items']['item']);
                           $ajs['items']['item'][0] = $aux;
                    }

                    foreach ($ajs['items'] as $kk => $items) {

                        foreach ($items as $k => $i) {
                            $shipItem = new ShipOrderItem([
                                'title'         => $i['title'],
                                'note'          => $i['note'],
                                'quantity'      => $i['quantity'],
                                'price'         => $i['price'],
                                'shiporderid'   => $ship->id,
                            ]);

                            $saveShipItem = $shipItem->save();
                            if($saveShipItem==false) {
                                throw new \Exception('Erro ao Salvar os itens!');
                            }
                        }
                    }
                }
            }

            return redirect()->route('ship-order.index');


        }catch (\Exception $e){
            return $e->getMessage();
            //return response()->json(['status'=>0]);;
        }
    }
}
