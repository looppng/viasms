<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $wallets = Wallet::where('user_id', Auth::user()->id)->get();

        return view('wallet.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wallet_name = $request->wallet_name;

        try {
            $wallet = new Wallet;
            $wallet->name = $wallet_name;
            $wallet->user_id = Auth::user()->id;
            $wallet->wallet_nr = 'LV' . $this->random_number(2) . 'HABA' . $this->random_number(13);
            $wallet->save();

            return redirect(route('wallet.home'))->with('success', 'Wallets <b>veiksmīgi</b> izveidots!');
        } catch (exception $e) {
            dd($e->getMessage());
        }

    }

    public function random_number($size = 5)
    {
        $random_number='';
        $count=0;
        while ($count < $size )
        {
            $random_digit = mt_rand(0, 9);
            $random_number .= $random_digit;
            $count++;
        }
        return $random_number;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $wallet = Wallet::findOrFail($id);

        return view('wallet.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wallet = Wallet::findOrFail($id);

        $wallet_name = $request->wallet_name;

        $wallet->name = $wallet_name;
        if ($wallet->save()) return redirect(route('wallet.home'))->with('success', 'Maciņam tagad cits nosaukums :(');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = Wallet::findOrFail($id);

        if ($wallet->delete()) {
            return redirect()->back()->with('success', 'Maciņa vairs nav');
        }
    }
}
