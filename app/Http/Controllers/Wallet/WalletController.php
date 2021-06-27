<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Auth;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public $wallet;

    public function __construct()
    {
        $this->wallet = new Wallet();
    }
    public function showWallet()
    {
        $data['menu'] = 'wallet';
        $userId = Auth::user()->id;
        $data['userWallet'] = $this->wallet->hasWallet($userId);
        $data['totalBalance'] = $this->wallet->balanceCalculate($data['userWallet']->point, "USD");

        return view('wallet.view', $data);
    }
}
