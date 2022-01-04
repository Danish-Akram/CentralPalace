<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Mail\UserMail;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Exports\AccountExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;



class AccountController extends Controller
{
   public function report() {
    if (session() -> has('LoggedUser')) {
        //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

        $user = DB::table('users') -> where('id', session('LoggedUser')) -> first();
        //   $data = [       'LoggedUserInfo'=>$user      ];
    }
    $account = Account::all();
    $data = Menu::all();
    return view("file.account.account", compact('data', 'user', 'account'));
}
    public function ajax_post(Request $request){
        $code = Account::where('code', $request->account_code)->first();
        $desciption = Account::where('description', $request->description)->first();
        if ($code) {
            return 'exist';
        }
        else if($desciption){
            return $desciption;
        }else{
            return '';
        }
}
    public function fetch_acoount_code(Request $request)
    {
        if ($request->get('control')) {
            $control = $request->get('control');
            $control_code = DB::table('accounts')->where('code', $control)->count();
            if ($control_code) {
                echo'control code already exist';
            //     if ($sub_control_code) {
            //         echo 'sub control already exist';
            //             }else{
            //     echo 'sub control unique';
            // }
        }
            else{
                echo'control code not exist';
            }

                // if ($sub_control_code) {
                //     echo 'not_unique';
                // }else{
                //     echo 'unique';
                // }
        //     return response()->json([
        //     'code'=>$account_code
        // ]);
    }
}
    public function account_insert_page(){
        if(session()->has('LoggedUser')){
            //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

             $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            //   $data = [
            //       'LoggedUserInfo'=>$user
            //      ];
            }
        $data = Menu::all();
        // $data = DB::table('accounts')->max('tcapcod')+1;
        return view('file.account.account_insert_page',compact('data','user'));
    }

    public function account_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

             $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            //   $data = [
            //       'LoggedUserInfo'=>$user
            //      ];
            }
                $data = new Account();
                $now = now();
                $data->code = strtoupper($request->code) ;
                $data->description = strtoupper($request->description);
                $data->urdu_description = $request->urdu_description;
                $data->status = strtoupper($request->status);
                $data->debit_amount = str_replace(',','',$request->debit_amount);
                $data->credit_amount = str_replace(',','',$request->credit_amount);
                $data->ntn = strtoupper($request->ntn);
                $data->strn = strtoupper($request->strn);
                $data->nic = strtoupper($request->nic);
                $data->email = strtoupper($request->email);
                $data->mobile = ($request->mobile);
                $data->created_by = $user->name;
                $data->created_at = $now;
                $data->save();
                return redirect()->route('account');

    }

public function account_update_page($id){
    if(session()->has('LoggedUser')){
        //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

         $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        //   $data = [
        //       'LoggedUserInfo'=>$user
        //      ];
        }
    $account = Account::find($id);
    $data = Menu::all();
    return view('file.account.account_update_page',compact('data','account','user'));
}
public function account_update_data(Request $request, $id){
    if(session()->has('LoggedUser')){
        //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

         $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        //   $data = [
        //       'LoggedUserInfo'=>$user
        //      ];
        }
        $data = Account::find($id);
        $now = now();
        $data->code = strtoupper($request->code) ;
        $data->description = strtoupper($request->description);
        $data->urdu_description = $request->urdu_description;
        $data->status = strtoupper($request->status);
        $data->debit_amount = strtoupper($request->debit_amount);
        $data->credit_amount = strtoupper($request->credit_amount);
        $data->ntn = strtoupper($request->ntn);
        $data->strn = strtoupper($request->strn);
        $data->nic = strtoupper($request->nic);
        $data->email = strtoupper($request->email);
        $data->mobile = ($request->mobile);
        $data->updated_by = $user->name;
        $data->updated_at = $now;
        $data->save();
        return redirect()->route('account');
    }
public function account_view_page(Request $request, $id){
    if(session()->has('LoggedUser')){
        //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

         $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        //   $data = [
        //       'LoggedUserInfo'=>$user
        //      ];
        }
        $account = Account::find($id);
    $data = Menu::all();
    return view('file.account.account_view_page',compact('data','account','user'));
}

public function account_pdf()
{
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_customer_data_to_html());
    return $pdf->stream();

    
    // if(session()->has('LoggedUser')){
    //     //  $user = Signup::where('id','=' , session('LoggedUser'))->first();

    //      $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
    //     //   $data = [
    //     //       'LoggedUserInfo'=>$user
    //     //      ];
    //     }
    // $data = DB::table('accounts')->select('code')->get();
    // view()->share('data',$data);
    // $pdf = PDF::loadView('pdf')->setPaper('a4', 'portrait');
    // return $pdf->stream('pdf');
}
function convert_customer_data_to_html()
    {
     $customer_data = Account::all();
     $output = '
     <h3 align="center">Account Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Code</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Description</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Urdu Descriptiom</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Status</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Created</th>
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->code.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->description.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->urdu_description.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->status.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->created_by.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}