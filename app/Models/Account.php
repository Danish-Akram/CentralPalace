<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = ['code','description','status','debit_amount','credit_amount','ntn','strn','nic','image'];
}
