<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['tctgcod','tctgdsc','tctgsts','twebsts','tctgpic'];

    // public static function getCategory(){
    //     $data = DB::table('categories')
    //             ->select('id', 'tctgcod')
    //             ->get()->toArray();
    //             return $data;
    // }
}
