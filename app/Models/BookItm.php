<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookItm extends Model
{
    use HasFactory;
    protected $table = 'book_itms';
    protected $fillable = ['ttrnnum','titmcod','tsernum'];
}
