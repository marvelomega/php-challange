<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function processXML($request){

        try{
            $files = $request->file('xml');

            $validFiles = [];
            foreach ($files as $key => $f) {
                if($f->getClientOriginalExtension()=='xml'){
                    $validFiles[$key] = $f;
                }
            }

            if(sizeof($validFiles)==0 || empty($validFiles)==true){
                throw new \Exception("Invalid File", 1);
            }

            $arrayJson = [];
            foreach ($validFiles as $key => $vf) {
                $auxXml = file_get_contents($vf->getPathName());
                $xml = simplexml_load_string($auxXml, "SimpleXMLElement", LIBXML_NOCDATA);
                $json = json_encode($xml);
                $arrayJsonAux = json_decode($json,TRUE);

                foreach ($arrayJsonAux as $key => $ajx) {
                    foreach ($ajx as $k => $ax) {
                        $arrayJson[$k] = $ax;
                    }
                }
            }

            if(sizeof($arrayJson)==0){
                throw new \Exception("Ivalid XML", 1);
            }

            return ['return'=>true,'array'=>$arrayJson];

        }catch (\Exception $e){
            return ['return'=>false,'message'=>$e->getMessage()];
        }
    }
}
