<?php

namespace App\Models;

class TArticle extends BaseModel
{
    /**
     * モデルと関連しているテーブル
     * @var string t_articles
     */
    protected $table = 't_articles';
    // IDを指定
    protected $primaryKey = 'article_id';
    // タイムスタンプOFF
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_kind','title','sub_title','content','top_image',
        'post_user','status_id','number_views','created_at','updated_at','is_deleted',
    ];
}
