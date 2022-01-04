<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glkey extends Model
{
    use HasFactory;
    
    protected $table = 'glkeys';
    protected $fillable = ['ttrnnum','ttrndat','ttrntim','ttrntyp','trefcod','tcstnam','thalcod','tfuncod','ttempcod','tevtdat',
    'tgstnum','tperhed','ttimfrm','ttimtoo','thalchg','tacchg','tdecchg','tdjchg','thetchg','ttrntot','tadvamt','ttrnrem'];

}
