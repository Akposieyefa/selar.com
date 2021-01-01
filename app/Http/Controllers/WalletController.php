<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Mail\CreateWallet;
use Illuminate\Support\Facades\Mail;
use Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = Wallet::where('user_id', '=', Auth::user()->id)->get();
            return  view('wallet.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id = 2) {
            return view('wallet.create');
        }else {
            return redirect()->route('dashboard')->with('access-error', 'Sorry you can not access this page');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'desc' => 'required',
            'amount' => 'required',
            'name' => 'required'
        ]);
        $wallet = new Wallet;
        $wallet->user_id = Auth::user()->id;
        $wallet->name = $request->input('name');
        $wallet->currency = $request->input('currency');
        $wallet->amount = $request->input('amount');
        $wallet->desc = $request->input('desc');
        $wallet->save();
        $data = array(
            'name' => Auth::user()->name,
            'currency' => $request->input('currency')
        );
        try {
            Mail::to(Auth::user()->email)->send(new CreateWallet($data));
        }catch  (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route('wallets.create')->with('success', 'Wallet created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Wallet::find($id);
        return  view('wallet.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Wallet::find($id);
        return  view('wallet.edit', ['data' => $data]);
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
        $request->validate([
            'currency' => 'required',
            'desc' => 'required',
            'name' => 'required'
        ]);
        $wallet = Wallet::find($id);
        $wallet->name = $request->input('name');
        $wallet->currency = $request->input('currency');
        $wallet->desc = $request->input('desc');
        $wallet->save();
        return redirect()->route('wallets.edit', $id)->with('success', 'Your wallet have been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wallet::find($id);
        $data->delete();
        return redirect()->route('wallets.index')->with('success', 'Wallet deleted successfully');
    }
}
