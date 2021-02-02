<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTag extends Model
{
    /**
     * モデルと関連しているテーブル
     * @var string m_tags
     */
    protected $table = 'm_tags';
    // IDを指定
    protected $primaryKey = 'tag_id';
    // タイムスタンプOFF
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id','tag_name'
    ];
}
