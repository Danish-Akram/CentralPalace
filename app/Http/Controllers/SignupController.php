<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use SebastianBergmann\Environment\Console;

class SignupController extends Controller
{

    public function signup(){
        return view('signup');
    }
    public function login(){
        return view('login');
    }

    public function insert_form(Request $request){
         $request->validate([
             'user'=> 'required',
             'email'=>'required|email|unique:signups',
             'password'=>'required|min:8|max:12'
         ]);
        $signup = new User();
        $signup->name = $request->name;
        $signup->email = $request->email;
        $signup->password = Hash::make($request->password);
        $query = $signup->save();

        // $query = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)];

        // DB::table('users')->insert($query);


        if($query){
             return back()->with('success', 'You have been successfully registered');
         }else{
         return back()->with('fail', 'something went wrong');
         }
    }


   public function login_auth(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|max:12'
        ]);

        $user = User::where('name','=', $request->email)->first();

        // $user = DB::table('users')
        // ->where('email', $request->email)->first();
        if($user){
            if($user->password == $request->password){
                $request->session()->put('LoggedUser', $user->id);
                return redirect()->route('home');
            }else{
                return back()->with('fail','Invalid Password');
            }
        }else{
            return back()->with('fail','No Account');
        }
            

     }


    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect()->route('login');
        }
    }

    // public function home(){
    //     $data = Crud::all();
    //     return view('home', compact('data'));
    // }

}
