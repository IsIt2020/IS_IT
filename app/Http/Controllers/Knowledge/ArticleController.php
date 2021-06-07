<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TArticle;

class ArticleController extends Controller
{
    /**
     * 記事画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function show($article_id){
        // 対象lnowledge記事を取得
        $article = TArticle::from('t_articles as ta')
            ->where('ta.id', $article_id)
            ->join('t_members as tm', 'tm.id', 'ta.post_user')
            ->first();
        // 閲覧数を1増加
        TArticle::where('id', $article_id)
            ->increment('number_views');
        
        return view('pages/knowledge/article', compact('article'));
    }
}