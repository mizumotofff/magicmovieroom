<?php

namespace magicmovieroom;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     public $timestamps = false;

    protected $dates = ['time'];
    protected $table = 'Movie';
}
