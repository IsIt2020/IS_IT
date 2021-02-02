<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TArticle;

class TopController extends Controller
{

    /**
     * 記事画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 記事の種類を定義
        $article_kind = config('const.db.m_article_kinds.knowledge.ID');
        // knowledge記事を一覧で取得
        $articles = TArticle::from('t_articles as ta')
            ->join('t_members as tm', 'tm.member_id', 'ta.post_user')
            ->where('article_kind',$article_kind)
            ->where('ta.is_deleted',false)
            ->orderBy('article_id', 'desc')
            ->limit(4)
            ->get();
        
        return view('pages/main/top', compact('articles'));
    }
}
