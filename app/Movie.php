<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     public $timestamps = false;
    protected $table = 'Movie';
}
