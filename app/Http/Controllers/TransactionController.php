<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Mail\TransactionMail;
use App\Notifications\TransactionNotification;
use Notification;
use Illuminate\Support\Facades\Mail;
use Auth;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = Wallet::where('user_id', '=', Auth::user()->id)->get();
            return  view('transaction.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id = 2) {
            $data = Wallet::where('user_id', '=', Auth::user()->id)->get();
            return view('transaction.create',['data' => $data]);
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
            'wallet_id' => 'required',
            'amount' => 'required',
            'account' => 'required',
        ]);
        $transaction = new Transaction;
        $transaction->wallet_id  = $request->input('wallet_id');
        $transaction->request_amount = $request->input('amount');
        $transaction->account_number = $request->input('account');
        $transaction->save();
        $data = array(
            'name' => Auth::user()->name,
        );
        try {
            Mail::to(Auth::user()->email)->send(new TransactionMail($data));
        }catch  (\Exception $e) {
            return $e->getMessage();
        }
        try {
            Notification::route('slack', env('SLACK_WEBHOOK_URL'))
                ->notify(new TransactionNotification());
        } catch (\Exception $e) {
           return  $e->getMessage();
        }

        return redirect()->route('transactions.create')->with('success', 'Transaction initiated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transaction::where('wallet_id', '=', $id)->get();
        $wallet = Wallet::find($id);
        return  view('transaction.show', ['data' => $data, 'wallet' => $wallet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaction::find($id);
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
        $data = Transaction::find($id);
        $data->status = "Approved";
        $data->save();
        dd('Thanks Akposieyefa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::find($id);
        $data->delete();
        return redirect()->route('wallets.index')->with('success', 'Wallet deleted successfully');
    }
}
