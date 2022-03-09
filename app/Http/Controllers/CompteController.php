<?php

namespace App\Http\Controllers;

use App\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteController extends Controller
{

    public function clientAccountsOnBank(Request $request){
        $comptes =  DB::table('comptes')->where('banque_id', '=', $request->chosenBank)->where('client_id', '=', $request->client_id)->get();
        if(!empty($comptes)) return response()->json($comptes);
    }

    public function setSoldeAccount(Request $request){
        $compte_id = $request->chosenCompte;
        $solde = $request->solde;

        $compte = Compte::find($compte_id);

        $compte->solde = $solde;
        
        if ($compte->save()) {
            $returnData = DB::table('comptes')->where('id', '=', $compte_id)->get();
            return response()->json($returnData);
        }
    }
}
