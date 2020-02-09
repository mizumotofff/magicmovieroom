<?php

namespace magicmovieroom;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     public $timestamps = false;
    protected $table = 'Review';
}
