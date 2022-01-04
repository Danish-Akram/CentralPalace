<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Menu::all();
            $employee = Employee::all();
            return view('file.employee.employee', compact('data','user','employee'));
        }
    }
    public function employee_insert_btn(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Menu::all();
            $employee = DB::table('employees')->max('code') + 1;
            return view('file.employee.employee_insert_page',compact('employee','user','data'));
        }
    }
    public function employee_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = new Employee();
            $data->code = strtoupper($request->code) ;
            $data->name = strtoupper($request->description);
            $data->status = $request->status;
            $data->created_by = $user->name;
            $data->save();
        }
        return redirect()->route('employee');
    }
    public function employee_update_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $employee = Employee::find($id);
            $data = Menu::all();
            return view('file.employee.employee_update_page',compact('data','employee','user'));
        }
    }
    public function employee_update_data(Request $request, $id){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Employee::find($id);
        $data->code = strtoupper($request->code) ;
        $data->name = strtoupper($request->description);
        $data->status = $request->status;
        $data->updated_by = $user->name;
        $data->save();
        }
        return redirect()->route('employee');
    }
    public function employee_view_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $employee = Employee::find($id);
            $data = Menu::all();
            return view('file.employee.employee_view_page',compact('data','employee','user'));
        }
    }
}
