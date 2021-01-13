<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Person;
use App\Http\Models\Phone;

class HomeController extends Controller
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
        $person = Person::all();
        return view('home', with(['person'=>$person]));
    }

    public function xmlPerson(Request $request)
    {

        try{

            $files = $request->file('xml');

            $validFiles = [];
            foreach ($files as $key => $f) {
                if($f->getClientOriginalExtension()=='xml'){
                    $validFiles[$key] = $f;
                }
            }

            if(sizeof($validFiles)==0){
                throw new Exception("arquivos Invalidos", 1);
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
                throw new Exception("Arquivo não pode ser processado", 1);
            }


            foreach ($arrayJson as $key => $ajs) {
                $person = new Person([
                    "personname"  => $ajs["personname"],
                    "personid"    => $ajs["personid"],
                ]);

                $save = $person->save();

                if($save==false) {
                    throw new \Exception('Erro ao Salvar!');
                }

                if(isset($ajs['phones'])){
                    foreach ($ajs['phones'] as $kk => $phones) {
                        if(!is_array($phones)){
                            $phonesaux[0] = $phones;
                            $phones = $phonesaux;
                        }

                        foreach ($phones as $k => $p) {
                             $phone = new Phone([
                                 "phone"        => $p,
                                 "person_id"    => $person->id,
                             ]);

                            $savePhone = $phone->save();
                            if($savePhone==false) {
                                throw new \Exception('Erro ao Salvar o telefone!');
                            }
                        }
                    }
                }
            }

            return redirect()->route('home');;


        }catch (\Exception $e){
            return $e->getMessage();
            //return response()->json(['status'=>0]);;
        }
    }
}
