<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function home(){
        if(session()->has('LoggedUser')){
             $user = User::where('id','=' , session('LoggedUser'))->first();
            }
            $data = Menu::all();
            return view('home', compact('user','data'));
        }
}
