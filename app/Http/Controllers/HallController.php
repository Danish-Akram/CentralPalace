<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Menu::all();
            $hall = Hall::all();
            return view('file.hall.hall', compact('data','user','hall'));
        }
    }
    public function hall_insert_btn(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Menu::all();
            $hall = DB::table('halls')->max('code') + 1;
            return view('file.hall.hall_insert_page',compact('hall','user','data'));
        }
    }
    public function hall_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = new Hall();
            $data->code = strtoupper($request->code) ;
            $data->description = strtoupper($request->description);
            $data->status = $request->status;
            $data->created_by = $user->name;
            $data->save();
        }
        return redirect()->route('hall');
    }
    public function hall_update_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $hall = Hall::find($id);
            $data = Menu::all();
            return view('file.hall.hall_update_page',compact('data','hall','user'));
        }
    }
    public function hall_update_data(Request $request, $id){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Hall::find($id);
        $data->code = strtoupper($request->code) ;
        $data->description = strtoupper($request->description);
        $data->status = $request->status;
        $data->updated_by = $user->name;
        $data->save();
        }
        return redirect()->route('hall');
    }
    public function hall_view_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $hall = Hall::find($id);
            $data = Menu::all();
            return view('file.hall.hall_view_page',compact('data','hall','user'));
        }
    }
}