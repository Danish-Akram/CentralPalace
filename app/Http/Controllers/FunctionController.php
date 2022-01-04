<?php

namespace App\Http\Controllers;

use App\Models\Functions;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FunctionController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Menu::all();
            $function = Functions::all();
            return view('file.function.function', compact('data','user','function'));
        }
    }
    public function function_insert_btn(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Menu::all();
            $function = DB::table('functions')->max('code') + 1;
            return view('file.function.function_insert_page',compact('function','user','data'));
        }
    }
    public function function_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = new Functions();
            $data->code = strtoupper($request->code) ;
            $data->description = strtoupper($request->description);
            $data->status = $request->status;
            $data->created_by = $user->name;
            $data->save();
        }
        return redirect()->route('function');
    }
    public function function_update_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $function = Functions::find($id);
            $data = Menu::all();
            return view('file.function.function_update_page',compact('data','function','user'));
        }
    }
    public function function_update_data(Request $request, $id){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Functions::find($id);
        $data->code = strtoupper($request->code) ;
        $data->description = strtoupper($request->description);
        $data->status = $request->status;
        $data->updated_by = $user->name;
        $data->save();
        }
        return redirect()->route('function');
    }
    public function function_view_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $function = Functions::find($id);
            $data = Menu::all();
            return view('file.function.function_view_page',compact('data','function','user'));
        }
    }}
