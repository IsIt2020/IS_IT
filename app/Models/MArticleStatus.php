<?php

namespace App\Models;

class MArticleStatus extends BaseModel
{
    /**
     * モデルと関連しているテーブル
     * @var string m_article_statuses
     */
    protected $table = 'm_article_statuses';
    // IDを指定
    protected $primaryKey = 'status_id';
}
