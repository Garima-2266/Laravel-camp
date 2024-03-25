<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image'))
        {
            User::uploadAvatar($request->image);
            // $request->session()->flash('message','Image Uploaded!'); 
            return redirect()->back()->with('message','Image Uploaded!');
        }

            // $filename=$request->image->getClientOriginalName();
            // $this->deleteOldImage();
            // $request->image->storeAs('images',$filename,'public');
            // auth()->user()->update(['avatar'=>$filename]);

        // $request->session()->flash('error','Image not Uploaded!'); 
        return redirect()->back()->with('error','Image not Uploaded!');
    }
    


    // protected function deleteOldImage()
    // {
    //     if($this->avatar){
    //         // dd('/public/images/'.auth()->user()->avatar);
    //         Storage::delete('/public/images/'. $this->avatar);
    // }

    // }
    public function index()
    {
    $data=[
        'name'=>'alex',
        'email'=>'alex@gmail.com',
        'password'=>bcrypt('pass'),
    ];
    

    // User::create($data);



    
    // $user=new User();
    // $user->name='Garima';
    // $user->email='garima@gmail.com';
    // $user->password=bcrypt('pass');
    // $user->save();
    

    $user=User::all();
    return $user;


    // User::where('id',3)->delete();

    // User::where('id',1)->update(['name'=>'Bitbyte']);
    // $user=User::all();
    // return $user;

//     DB::insert('INSERT INTO users (name,email,password)
//     VALUES(?,?,?)',[
// 'Hello',
// 'hello@gmail.com',
// 'pass',
//     ]); 
//     return view('home');

// $users=DB::select('SELECT *FROM users');
// return $users;


// DB::update('update users set name = ? where id=1',['Hi']);


//    DB::delete('DELETE FROM users where id=1');

// $users=DB::select('select *from users');
// return $users;


return view('home');

 }

}
