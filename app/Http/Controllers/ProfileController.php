<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function editview(){
        return view('ubahprofile');
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

        return redirect('profile');
    }
}
