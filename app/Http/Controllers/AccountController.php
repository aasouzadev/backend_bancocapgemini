<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::all();

        return response()->json($accounts);
    }

    public function balance($id)
    {
        $account = Account::find($id);
        if (!$account) {
            return response()->json([
                'message'   => 'Conta não encontrada',
            ], 404);
        }

        return response()->json($account);
    }

    public function storeAccount(Request $request)
    {
        $account = Account::create($request->all());
    }


    public function transaction(Request $request, $id)
    {

        $account = Account::find($id);
        if (!$account) {
            return response()->json([
                'message'   => 'Conta não encontrada',
            ], 404);
        }else if(!$account->passwordCheck($request->senha) && $request->senha){
            return response()->json([
                'message'   => 'Senha invalida',
            ], 404);
        }

        else if (!$account->newBalance($request->valor, $request->tipo_transacao)) {
            return response()->json([
                'message'   => 'Saldo insuficiente'
            ], 404);
        }else{

          //  $account->newBalance($request->valor, $request->tipo_transacao);

            return  response()->json($account);
        }

    }

}
