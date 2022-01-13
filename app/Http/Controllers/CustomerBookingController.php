<?php

namespace App\Http\Controllers;

use App\Models\BookItm;
use App\Models\Hall;
use App\Models\Item;
use App\Models\Menu;
use App\Models\Glkey;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerBookingController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Menu::all();
        $customerBooking = Glkey::all();

        return view('transaction.customerBooking.customerBooking', ['data'=> $data] ,compact('user','customerBooking'));
        }
    }
    public function customerBooking_insert_btn(){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Menu::all();
        $hall = Hall::all();
        $item = DB::table('items')
        ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
        ->select('items.*','categories.tctgdsc')
        ->get();
        $customer = Customer::all();
        $function = Functions::all();
        $trnnum = Glkey::max('ttrnnum')+1;
        $employee = Employee::all();
        return view('transaction.customerBooking.customerBooking_insert_btn', ['data'=> $data] ,compact('user',
        'item','hall','function','customer','trnnum','employee'));
        }
    }
    public function customerBooking_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = new Glkey();
            $data->ttrnnum = ($request->bookingId) ;
            $data->ttrndat = ($request->bookingDate);
            $data->ttrntim = ($request->bookingtime);
            $data->trefcod = ($request->cusCode);
            $data->tcstnam = strtoupper($request->cusName);
            $data->ttrnrem = strtoupper($request->cusRemarks);
            $data->tcstadd1 = strtoupper($request->address1);
            $data->tcstadd2 = strtoupper($request->address2);
            $data->tcstema = ($request->email);
            $data->tphnnum = ($request->mobile) ;
            $data->tcstnic = ($request->nic);
            $data->tevtdat = ($request->eventDate);
            $data->thalcod = ($request->hallCode);
            $data->tgstnum = ($request->numGuest);
            $data->tperhed = $request->perHead;
            $data->tfuncod = $request->funCode;
            $data->tempcod = $request->employeeCode;
            $data->ttimfrm = strtoupper($request->timefrom);
            $data->ttimtoo = strtoupper($request->timeto);
            $data->thalchg = ($request->hallChg);
            $data->tacchg = $request->acChg;
            $data->tdecchg = $request->decorChg;
            $data->tdjchg = $request->djChg;
            $data->thetchg = ($request->haetingChg);
            $data->ttrntot = ($request->totalAmt);
            $data->tadvamt = ($request->advance);
            $data->tbalamt = $request->balance;
            $data->ttrntyp = 'bok';
            $data->save();
            // $booking->ttrnnum = $request->bookingId;
            // $booking->titmcod = $request->titmcod;
            $itmcod = $request->titmcod;

            if($itmcod > 0 ){

            for( $i = 0 ; $i < count($itmcod); $i++){
                $booking = new BookItm();
                $booking->ttrnnum = $request->bookingId;
                $booking->titmcod = $request->titmcod[$i];
                $booking->tsernum = $request->tsernum[$i];
                $booking->titmdsc = $request->titmdsc[$i];
                $booking->titmctg = $request->titmctg[$i];
                $booking->save();
            }
        }else{

        }
            return redirect()->route('customerBooking');
        }
    }
    public function customerBooking_update_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $glkey = Glkey::find($id);
            $data = Menu::all();
            $hall = Hall::all();
            $hallDes = DB::table('glkeys')
            ->join('halls', 'glkeys.thalcod', '=', 'halls.code')
            ->select('glkeys.*','halls.description')
            ->where('glkeys.id',$id)
            ->first();
            $funDes = DB::table('glkeys')
            ->join('functions', 'glkeys.tfuncod', '=', 'functions.code')
            ->select('glkeys.*','functions.description')
            ->where('glkeys.id',$id)
            ->first();
            $empDes = DB::table('glkeys')
            ->join('employees', 'glkeys.tempcod', '=', 'employees.code')
            ->select('glkeys.*','employees.name')
            ->where('glkeys.id',$id)
            ->first();
            $item = DB::table('items')
            ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
            ->select('items.*','categories.tctgdsc')
            ->get();
            $customer = Customer::all();
            $function = Functions::all();
            $employee = Employee::all();
            $customer = Customer::all();
            $bookitm = DB::table('glkeys')
            ->join('book_itms', 'glkeys.ttrnnum', '=', 'book_itms.ttrnnum')
            ->join('items', 'book_itms.titmcod', '=', 'items.titmcod')
            ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
            ->select('glkeys.*', 'book_itms.titmcod','items.titmdsc','categories.tctgdsc','book_itms.tsernum')
            ->where('glkeys.id',$id)
            ->get();
            return view('transaction.customerBooking.customerBooking_update_page',compact('data',
            'glkey','user' ,'item','hall','hallDes','function','funDes','employee','empDes',
            'customer','bookitm'));
    }
}


public function customerBooking_update_data(Request $request, $id){
    if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $data = Glkey::find($id);
        $data->ttrnnum = ($request->bookingId) ;
        $data->ttrndat = ($request->bookingDate);
        $data->ttrntim = ($request->bookingtime);
        $data->trefcod = ($request->cusCode);
        $data->tcstnam = strtoupper($request->cusName);
        $data->ttrnrem = strtoupper($request->cusRemarks);
        $data->tcstadd1 = strtoupper($request->address1);
        $data->tcstadd2 = strtoupper($request->address2);
        $data->tcstema = strtoupper($request->email);
        $data->tphnnum = ($request->mobile) ;
        $data->tcstnic = ($request->nic);
        $data->tevtdat = ($request->eventDate);
        $data->thalcod = ($request->hallCode);
        $data->tgstnum = ($request->numGuest);
        $data->tperhed = $request->perHead;
        $data->tfuncod = $request->funCode;
        $data->tempcod = $request->employeeCode;
        $data->ttimfrm = strtoupper($request->timefrom);
        $data->ttimtoo = strtoupper($request->timeto);
        $data->thalchg = ($request->hallChg);
        $data->tacchg = $request->acChg;
        $data->tdecchg = $request->decorChg;
        $data->tdjchg = $request->djChg;
        $data->thetchg = ($request->haetingChg);
        $data->ttrntot = ($request->totalAmt);
        $data->tadvamt = ($request->advance);
        $data->tbalamt = $request->balance;
        $data->ttrntyp = 'bok';
        $data->save();
        // $booking->ttrnnum = $request->bookingId;
        // $booking->titmcod = $request->titmcod;
        $itmcod = $request->titmcod;

        if($itmcod > 0 ){
            for( $i = 0 ; $i < count($itmcod); $i++){
                $booking =BookItm::join('glkeys','book_itms.ttrnnum','glkeys.ttrnnum')
                ->where('glkeys.id',$id);
                $booking->ttrnnum = $request->bookingId;
                $booking->titmcod = $request->titmcod[$i];
                $booking->tsernum = $request->tsernum[$i];
                $booking->save();
            }
        }else{

        }


        return redirect()->route('customerBooking');
    }
}

public function customerBooking_view_page($id){
    if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $glkey = Glkey::find($id);
        $data = Menu::all();
        $hall = Hall::all();
        $hallDes = DB::table('glkeys')
        ->join('halls', 'glkeys.thalcod', '=', 'halls.code')
        ->select('glkeys.*','halls.description')
        ->where('glkeys.id',$id)
        ->first();
        $funDes = DB::table('glkeys')
        ->join('functions', 'glkeys.tfuncod', '=', 'functions.code')
        ->select('glkeys.*','functions.description')
        ->where('glkeys.id',$id)
        ->first();
        $empDes = DB::table('glkeys')
        ->join('employees', 'glkeys.tempcod', '=', 'employees.code')
        ->select('glkeys.*','employees.name')
        ->where('glkeys.id',$id)
        ->first();
        $item = DB::table('items')
        ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
        ->select('items.*','categories.tctgdsc')
        ->get();
        $customer = Customer::all();
        $function = Functions::all();
        $employee = Employee::all();
        $customer = Customer::all();
        $bookitm = DB::table('glkeys')
        ->join('book_itms', 'glkeys.ttrnnum', '=', 'book_itms.ttrnnum')
        ->join('items', 'book_itms.titmcod', '=', 'items.titmcod')
        ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
        ->select('glkeys.*', 'book_itms.titmcod', 'book_itms.tsernum','items.titmdsc','categories.tctgdsc')
        ->where('glkeys.id',$id)
        ->get();
        return view('transaction.customerBooking.customerBooking_view_page',compact('data',
        'glkey','user' ,'item','hall','hallDes','function','funDes','employee','empDes',
        'customer','bookitm'));
}
}

public function customerBooking_print_page($id){
    $customer = Glkey::find($id);
        $data = Menu::all();
        $hallDes = DB::table('glkeys')
        ->join('halls', 'glkeys.thalcod', '=', 'halls.code')
        ->select('glkeys.*','halls.description')
        ->where('glkeys.id',$id)
        ->first();
        $funDes = DB::table('glkeys')
        ->join('functions', 'glkeys.tfuncod', '=', 'functions.code')
        ->select('glkeys.*','functions.description')
        ->where('glkeys.id',$id)
        ->first();
        $empDes = DB::table('glkeys')
        ->join('employees', 'glkeys.tempcod', '=', 'employees.code')
        ->select('glkeys.*','employees.name')
        ->where('glkeys.id',$id)
        ->first();
        $item = DB::table('items')
        ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
        ->select('items.*','categories.tctgdsc')
        ->get();
        $bookitm = DB::table('book_itms')
        ->join('glkeys', 'book_itms.ttrnnum', '=', 'glkeys.ttrnnum')
        ->where('glkeys.id',$id)
        ->orderBy('book_itms.titmctg')
        ->select('book_itms.titmctg','book_itms.titmdsc')
        ->get();


    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML(view('transaction.customerBooking.customerBooking_print_page', compact('data',
    'item','hallDes','funDes','empDes',
    'customer','bookitm')));
    return $pdf->stream();
}
}
