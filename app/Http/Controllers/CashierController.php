<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CashierController extends Controller
{
    public function index(){
        $user_detail = User::all();
        return view('cashier', ['user_info' => $user_detail]);
    }

    public function addview(){
        return view('addcashier');
    }

    public function add_Cashier(Request $request){
        $file = $request->file('image');
        $imagename = time().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $imagename);
        $imagepath = 'images/'.$imagename;

        $user = new User();
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $makepassword = Hash::make($request->password);
        $user->password = $makepassword;
        $user->image = $imagepath;
        $user->save();
        return redirect('/cashier');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('cashier');
    }

    public function editview(){
        return view('editCashier');
    }

    public function edit(Request $request){
        if($request!=null){
            $id = $request->id;
            $user = User::find($id);
            $file = $request->file('image');
            if($file != null){
                $imageName = time().'_'.$file->getClientOriginalName();
                Storage::putFileAs('public/images', $file, $imageName);
                $imagePath = 'images/'.$imageName;

                Storage::delete('public/'.$user->image);

                $user->image = $imagePath;
            }

            if($request->name != null)
                $user->name = $request->name;

            if($request->email != null)
                $user->email = $request->email;

            if($request->password != null){
                $pass = Hash::make($request->password);
                $user->password = $pass;
            }
                
            $user->save();
        }

        return redirect('cashier');
    }
}
