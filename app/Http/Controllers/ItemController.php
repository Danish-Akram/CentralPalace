<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
use App\Models\Company;
use App\Models\Capacity;
use App\Models\Category;
use App\Exports\ItemExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

// use PDF;

class ItemController extends Controller
{
    public function report(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $item = Item::all();
            $data = Menu::all();
            return view('file.item.item',compact('data','user','item'));
            // $item = DB::table('items')
            // ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
            // ->join('companies', 'items.tcmpcod', '=', 'companies.tcmpcod')
            // ->join('capacities', 'items.tcapcod', '=', 'capacities.tcapcod')
            // ->select('items.*','categories.tctgdsc', 'companies.tcmpdsc','capacities.tcapdsc')
            // ->get();
        }
    }
    public function ajax_item_description(Request $request)
    {
        $description = Item::where('titmdsc', $request->description)->first();
        if ($description) {
            return $description;
        }else{
            return '';
        }
    }
    public function item_insert_page(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $categories = DB::table('categories')->orderBy('categories.tctgdsc','asc')->get();
            $data = Menu::all();
            $id = Item::max('titmcod')+1;
            return view('file.item.item_insert_page',compact('categories','user','data','id'));
        }
    }

    public function item_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user = User::where('id','=' , session('LoggedUser'))->first();
            }
        $data = new Item();
        $now=now();
        $data->titmcod = strtoupper($request->titmcod);
        $data->titmsts = strtoupper($request->titmsts );
        $data->titmdsc = strtoupper($request->titmdsc) ;
        $data->twrndsc = strtoupper($request->twrndsc) ;
        $data->tcmpcod = strtoupper($request->tcmpcod) ;
        $data->tctgcod = strtoupper($request->tctgcod) ;
        $data->tcapcod = strtoupper($request->tcapcod) ;
        $data->titmuom = strtoupper($request->titmuom) ;
        $data->ttypcod = strtoupper($request->ttypcod) ;
        $data->titmlev = ($request->titmlev) ;
        $data->titmnat = strtoupper($request->titmnat) ;
        $data->tpurrat = (float) str_replace(',', '',$request->tpurrat);
        $data->tmanrat = (float) str_replace(',', '',$request->tmanrat) ;
        $data->tsalrat = (float) str_replace(',', '',$request->tsalrat) ;
        $data->trtlrat = (float) str_replace(',', '',$request->trtlrat) ;
        $data->tfixrat = (float) str_replace(',', '',$request->tfixrat) ;
        $data->tlckrat = (float) str_replace(',', '',$request->tlckrat );
        $data->thlfrat = (float) str_replace(',', '',$request->thlfrat) ;
        $data->tactrat = (float) str_replace(',', '',$request->tactrat) ;
        $data->tinsprc = (float) str_replace(',', '',$request->tinsprc) ;
        $data->tinsrat = (float) str_replace(',', '',$request->tinsrat) ;
        $data->twebcod = strtoupper($request->twebcod) ;
        $data->twebrat = (float) str_replace(',', '',$request->twebrat) ;
        $data->tcreated_by = $user->name;
        $data->created_at = $now;
        // $image = $request->file('image');
        // if($image==null){
        //     $data->save();
        //     return redirect()->route('item');
        // }else{
        // $image_ext = $image->getClientOriginalExtension();
        // $image_name = rand(123456,999999).'.'.$image_ext;
        // $image_path = public_path('image/');
        // $image->move($image_path,$image_name);
        // $data->image = $image_name ;
        $data->save();
        return redirect()->route('item');
    //}
    }
    public function item_update_page($id){
        if(session()->has('LoggedUser')){
            $user = User::where('id','=' , session('LoggedUser'))->first();
        }
            $item = DB::table('items')
                    ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
                    ->select('items.*','categories.tctgdsc')
                    ->where('items.id',$id)
                    ->first();
            $data = Menu::all();
            $categories = Category::all();
            return view('file.item.item_update_page',compact('data','user','item','categories'));
    }
    public function item_update_data(Request $request, $id){
        if(session()->has('LoggedUser')){
             $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            }
        $data = Item::find($id);
        $now=now();
        $data->titmcod = strtoupper($request->titmcod);
        $data->titmsts = strtoupper($request->titmsts );
        $data->titmdsc = strtoupper($request->titmdsc) ;
        $data->twrndsc = strtoupper($request->twrndsc) ;
        $data->tcmpcod = strtoupper($request->tcmpcod) ;
        $data->tctgcod = strtoupper($request->tctgcod) ;
        $data->tcapcod = strtoupper($request->tcapcod) ;
        $data->titmuom = strtoupper($request->titmuom) ;
        $data->ttypcod = strtoupper($request->ttypcod) ;
        $data->titmlev = ($request->titmlev) ;
        $data->titmnat = strtoupper($request->titmnat) ;
        $data->tpurrat = ($request->tpurrat) ;
        $data->tmanrat = ($request->tmanrat) ;
        $data->tsalrat = ($request->tsalrat) ;
        $data->trtlrat = ($request->trtlrat) ;
        $data->tfixrat = ($request->tfixrat) ;
        $data->tlckrat = ($request->tlckrat );
        $data->thlfrat = ($request->thlfrat) ;
        $data->tactrat = ($request->tactrat) ;
        $data->tinsprc = ($request->tinsprc) ;
        $data->tinsrat = ($request->tinsrat) ;
        $data->twebcod = strtoupper($request->twebcod) ;
        $data->twebrat = ($request->twebrat) ;
        $data->tupdated_by = $user->name;
        $data->updated_at = $now;
        // $image = $data->image;
        // if($request->hasFile('image')){
        //     if ($image == null) {
        //         $image = $request->file('image');
        //         $image_ext = $image->getClientOriginalExtension();
        //         $image_name = rand(123456,999999).'.'.$image_ext;
        //         $image_path = public_path('image/');
        //         $image->move($image_path, $image_name);
        //         $data->image = $image_name;
        //     }
        //     else{
        //         unlink(public_path('image/' . $image));
        //         $image = $request->file('image');
        //         $image_ext = $image->getClientOriginalExtension();
        //         $image_name = rand(123456,999999).'.'.$image_ext;
        //         $image_path = public_path('image/');
        //         $image->move($image_path, $image_name);
        //         $data->image = $image_name;
        //     }
        // }
        // else{
        //     $data->image = $request->old_image;
        // }
        $data->save();
        return redirect()->route('item', $id);
    }

    public function item_view_page($id){
        if(session()->has('LoggedUser')){
        $user = User::where('id','=' , session('LoggedUser'))->first();}
        $item = DB::table('items')
        ->join('categories', 'items.tctgcod', '=', 'categories.tctgcod')
        ->select('items.*','categories.tctgdsc')
        ->where('items.id',$id)
        ->first();
        $data = Menu::all();
        $categories = Category::all();
        return view('file.item.item_view_page',compact('data','categories','item','user'));
    }


}
