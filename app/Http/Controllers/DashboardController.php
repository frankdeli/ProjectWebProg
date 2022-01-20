<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class DashboardController extends Controller
{
    public function index(){
        $var = User::where('role_id', 2);
        $countCashier =  $var->count();
        $var1 = Product::all();
        $countProduct = $var1->count();
        $var2 = Transaction::all();
        $countTransaction = $var2->count();
        return view('dashboard', ['countcas' => $countCashier, 'countpro' => $countProduct, 'counttran' => $countTransaction]);
    }
}
