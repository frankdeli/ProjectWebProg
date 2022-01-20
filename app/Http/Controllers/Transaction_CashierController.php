<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;

class Transaction_CashierController extends Controller
{
    public function index(){
        $tran = Transaction::all();
        return view('/transaction_cashier', ['tran' => $tran]);
    }

    public function addview(){
        $tran = Product::all();
        $user = User::all();
        return view('/addtransaksi', ['add' => $tran, 'user' => $user]);
    }

    public function addtransaksi(Request $request){
        $id = $request->item;
        $find = Product::find($id);

        $tran = new Transaction();
        // $tran->id = $request->id;
        $tran->cashier_id = $request->id;
        $tran->waktu_transaksi = date(now());
        $total = $request->quantity * $find->price;
        $tran->total = $total;
        $tran->save();

        $detail = new TransactionDetail();
        $detail->transaksi_id = $tran->id;
        $detail->product_id = $request->item;
        $detail->quantity = $request->quantity;
        $detail->price = $find->price;      
        $detail->save();

        // $pro = new Product();
        $find->stock = $find->stock - $request->quantity;
        $find->save();

        return redirect('/transaction_cashier');
    }

    public function destroy($id){
        $find = Transaction::find($id);
        $find->delete();
        return redirect('transaction_cashier');
    }

    public function viewDetail($id){
        $tran = TransactionDetail::where('transaksi_id', $id)->get();
        return view('/viewdetail', ['detail' => $tran]);
    }
}
