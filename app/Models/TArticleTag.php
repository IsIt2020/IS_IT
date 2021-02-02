<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TArticleTag extends Model
{
    /**
     * モデルと関連しているテーブル
     * @var string t_article_tags
     */
    protected $table = 't_article_tags';
    // IDを指定
    protected $primaryKey = ['article_id','tag_id'];
    // タイムスタンプOFF
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id','tag_id'
    ];
}
