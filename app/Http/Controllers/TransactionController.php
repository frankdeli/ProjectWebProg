<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $tran = Transaction::all();
        return view('transaction', ['transac' => $tran]);
    }
}
