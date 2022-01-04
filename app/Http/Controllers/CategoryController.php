<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SignupController;

class CategoryController extends Controller
{
    public function category(){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $category = Category::all();
        $data = Menu::all();
        return view('file.category.category', ['data'=> $data] ,compact('user','category'));
        }
    }
        public function ajax_category_description(Request $request)
        {
            $description = Category::where('tctgdsc', $request->description)->first();
            if ($description) {
                return $description;
            }else{
                return '';
            }
        }
    public function category_insert_btn(){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        }
        $category = DB::table('categories')->max('tctgcod')+1;
        $data = Menu::all();
        return view('file.category.category_insert_page', compact('user','category','data'));
    }
    public function category_insert_data(Request $request){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $menu = Menu::all();
            $data = new Category();
            $data->tctgcod = strtoupper($request->code);
            $data->tctgdsc = strtoupper($request->description);
            $data->tctgsts = strtoupper($request->status);
            $data->twebsts = strtoupper($request->web_status);
            $data->web_index = $request->web_index;
            $data->tcreated_by = $user->name;
            $tctgpic = $request->file('image');
            if($tctgpic==null){
                $data->save();
            }else{
                $tctgpic_ext = $tctgpic->getClientOriginalExtension();
                $tctgpic_name = rand(123456,999999).'.'.$tctgpic_ext;
                $tctgpic_path = public_path('image/');
                $tctgpic->move($tctgpic_path,$tctgpic_name);
                $data->tctgpic = $tctgpic_name;
                $data->save();
            }
            return redirect()->route('category');
        }
    }
    public function category_update_page($id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $category = Category::find($id);
            $data = Menu::all(); 
            return view('file.category.category_update_page',compact('data','category','user'));
        }
    }
    public function category_update_data(Request $request, $id){
        if(session()->has('LoggedUser')){
            $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
            $data = Category::find($id);
            $data->tctgcod = strtoupper($request->code) ;
            $data->tctgdsc = strtoupper($request->description);
            $data->tctgsts = strtoupper($request->status);
            $data->twebsts = strtoupper($request->web_status);
            $data->web_index = $request->web_index;
            $data->tupdated_by = $user->name;
            $image = $data->tctgpic;
            if($request->hasFile('image')){
                if ($image == null) {
                $image = $request->file('image');
                $image_ext = $image->getClientOriginalExtension();
                $image_name = rand(123456,999999).'.'.$image_ext;
                $image_path = public_path('image/');
                $image->move($image_path, $image_name);
                $data->tctgpic = $image_name;
            }
            else{
                unlink(public_path('image/' . $image));
                $image = $request->file('image');
                $image_ext = $image->getClientOriginalExtension();
                $image_name = rand(123456,999999).'.'.$image_ext;
                $image_path = public_path('image/');
                $image->move($image_path, $image_name);
                $data->tctgpic = $image_name;
            }
        }
        else{
            $data->tctgpic = $request->old_image;
        }
        $data->save();
        return redirect()->route('category', $id);
    }
}
    public function category_view_page($id){
        if(session()->has('LoggedUser')){
        $user =DB::table('users')->where('id' ,session('LoggedUser'))->first();
        $category = Category::find($id);
        $data = Menu::all();
        return view('file.category.category_view_page',compact('data','category','user'));
        }
    }
}
