<?php

namespace magicmovieroom;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     public $timestamps = false;
    protected $table = 'Comment';
}
