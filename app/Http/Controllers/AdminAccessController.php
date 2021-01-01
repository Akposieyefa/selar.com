<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
class AdminAccessController extends Controller
{
    public function  wallets() {
        $data = Wallet::paginate(2);
        return  view('wallet.index', ['data' => $data]);
    }

    public function transactions() {
        $data = Wallet::paginate(2);
        return  view('transaction.index', ['data' => $data]);
    }
}
