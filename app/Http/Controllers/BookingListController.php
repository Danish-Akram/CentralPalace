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

class BookingListController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
            $data = Menu::all();
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $bookitm = DB::table('glkeys')
            ->join('book_itms', 'glkeys.ttrnnum', '=', 'book_itms.ttrnnum')
            ->join('items', 'book_itms.titmcod', '=', 'items.titmcod')
            ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
            ->join('functions', 'glkeys.tfuncod', '=', 'functions.code')
            ->join('employees','glkeys.tempcod','=','employees.code')
            ->select('glkeys.*', 'book_itms.titmcod','items.titmdsc','categories.tctgdsc','book_itms.tsernum','employees.name',
            'functions.description')
            ->get();
            return view('transaction.bookingList.bookingList', ['data'=> $data] ,compact('user','bookitm'));
        }
    }
}
