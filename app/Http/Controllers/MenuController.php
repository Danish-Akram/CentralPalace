<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    static function menus(){
       if(session()->has('LoggedUser')){
            $user = User::where('id','=' , session('LoggedUser'))->first();
        
        $data1 = DB::table('user_menus')->join('menus', 'user_menus.menu_subid', 'menus.sub_id')
        ->select('menus.*', 'user_menus.status as um_status')
        ->where([
            ['user_menus.user_id', $user->id]
        ])
        ->get();
        $data = DB::select("select * from menupermission where submenu2 IS NULL and uid = ? ", [$user->id]);
        $data2 = DB::select("select * from menupermission where submenu2 IS NOT NULL and uid = ? ", [$user->id]);
        }
         return view('menu', compact('data','user','data2'));
    }

    static function menuListOld(){
        $userid = Session::get('user')['id'];
        $data = DB::table('user_menus')->join('menus', 'user_menus.menu_subid', 'menus.sub_id')
        ->select('menus.*', 'user_menus.status as um_status', 'user_menus.id as um_id')
        ->where([
            ['user_menus.user_id', $userid],
            ['user_menus.status', '!=', 'S']
        ])
        ->get();
         return $data;

    }

    static function userMenu(){
        $userid = Session::get('user')['id'];
        $data = DB::table('user_menus')->join('menus', 'user_menus.menu_subid', 'menus.sub_id')
        ->select('menus.*', 'user_menus.status as um_status', 'user_menus.id as um_id')
        ->where([
            ['user_menus.user_id', $userid]
        ])
        ->get();
         return $data;

    }

}
