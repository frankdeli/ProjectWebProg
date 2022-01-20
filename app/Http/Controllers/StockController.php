<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public function index(){
        $stock = Product::all();
        return view('stock', ['product' => $stock]);
    }

    public function addview(){
        return view('addstock');
    }

    public function add_Product(Request $request){
        $file = $request->file('image');
        $imagename = time().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $imagename);
        $imagepath = 'images/'.$imagename;

        $pro = new Product();
        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->stock = $request->stock;
        $pro->image = $imagepath;
        $pro->save();
        return redirect('stock');
    }

    public function edit(){
        return view('editStock');
    }

    public function edit_product(Request $request){
        $id = $request->id;
        $pro = Product::find($id);
        $file = $request->file('image');
        if($file != null){
            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/'.$imageName;

            Storage::delete('public/'.$pro->image);

            $pro->image = $imagePath;
        }

        if($request->name != null)
            $pro->name = $request->name;

        if($request->price != null)
            $pro->price = $request->price;

        if($request->stock != null)
            $pro->stock = $request->stock;
        
        $pro->save();
        return redirect('stock');
    }

    public function destroy($id){
        $pro = Product::find($id);
        $pro->delete();
        return redirect('stock');
    }
}
