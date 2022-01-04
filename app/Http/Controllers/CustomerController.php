<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Menu::all();
        $customer = Customer::all();
        return view('file.customer.customer', ['data'=> $data] ,compact('user','customer'));
        }
    }
    
    public function customer_insert_btn(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        }
        $customer = Customer::max('tcstcod');
        if ($customer == ''){
            $customer = '13-00-0000';
            }else{
                $customer;
            }
        $code = (float)str_replace('-','',$customer);
        $code += 1;
        $code = substr($code, 0, 2).'-' .substr($code, 2, 2). '-'.substr($code, 4, 4);
        $data = Menu::all();
        return view('file.customer.customer_insert_page', compact('user','data','code'));
    }
    public function customer_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();            
            $data = new Customer();
            $data->tcstcod = ($request->code) ;
            $data->tcstnam = strtoupper($request->name);
            $data->tcststs = strtoupper($request->status);
            $data->tcstadd1 = strtoupper($request->address1);
            $data->tcstadd2 = strtoupper($request->address2);
            $data->tcstnic = $request->nic;
            $data->tcstema = $request->email;
            $data->tphnnum = $request->mobile;
            $data->tcreated_by = $user->name;
            $data->save();
            $account = new Account();
            $account->code = ($request->code) ;
            $account->description = strtoupper($request->name);
            $account->status = strtoupper($request->status);
            $account->tcreated_by = $user->name;
            $account->save();
        }
        return redirect()->route('customer');
    }
    public function customer_update_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $customer = Customer::find($id);
            $data = Menu::all(); 
            return view('file.customer.customer_update_page',compact('data','customer','user'));
        }
    }
    public function customer_update_data(Request $request, $id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Customer::find($id);
            $data->tcstcod = ($request->code) ;
            $data->tcstnam = strtoupper($request->name);
            $data->tcststs = strtoupper($request->status);
            $data->tcstadd1 = strtoupper($request->address1);
            $data->tcstadd2 = strtoupper($request->address2);
            $data->tcstnic = $request->nic;
            $data->tcstema = $request->email;
            $data->tphnnum = $request->mobile;
            $data->tupdated_by = $user->name;
            
            $account = Account::find($id);
            $account->code = ($request->code) ;
            $account->description = strtoupper($request->name);
            $account->status = strtoupper($request->status);
            $account->tupdated_by = $user->name;
            $data->save();
            $account->save();
        return redirect()->route('customer', $id);
    }
}
    public function customer_view_page($id){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $customer = Customer::find($id);
        $data = Menu::all();
        return view('file.customer.customer_view_page',compact('data','customer','user'));
        }
    }
}
