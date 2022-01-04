<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['titmcod','titmdsc','twrndsc','titmsts','tctgcod','tcmpcod','titmnat','tappusr',
    'tedtusr','ttypcod','titmuom','tacccod','tdelflg','twebcod','tcapcod','tpurrat','tsalrat','tfixrat','tmanrat',
    'trtlrat','titmlev','tinsprc','tinsrat','tlckrat','tcomamt','tordqnt','tovgrat','thlfrat',
    'tactrat','tadvamt','tmthnum','twebrat','tedtdat','tappdat','tcreated_by','tupdated_by'];
}
