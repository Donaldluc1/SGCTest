<?php

namespace App\Http\Controllers;

use App\Banque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanqueController extends Controller
{
    public function index(){
        $banques = Banque::orderBy('created_at', 'desc')->get();
        return response()->json(['data'=>$banques], 200);
    }

    public function accounts(Request $request){
        $banque_id = $request->banque_id;
        $banque = Banque::where('id', $banque_id)->first();
        
        if(!empty($banque)) return response()->json(['data'=>$banque->accounts], 200);
        
    }

    public function clients(Request $request){
        $banque_id = $request->banque_id;
        $arrClients = [];
        
        if(!empty($banque_id)){
            $clients = DB::table('banque_client')->where('banque_id', $banque_id)->get();
            foreach ($clients as $client) {
                array_push($arrClients, $client->id);
            }
            $returnDatas = DB::table('clients')->whereIn('id', $arrClients)->get();
            return response()->json($returnDatas);
        }
    }
}
