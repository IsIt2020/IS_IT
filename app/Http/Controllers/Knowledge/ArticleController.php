<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TArticle;
use App\Models\TArticleTag;
use Carbon\Carbon;

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
            ->select(
                "ta.id as article_id",
                "ta.title",
                "ta.sub_title",
                "ta.content",
                "tm.user_name",
                "ta.number_views",
                "ta.created_at",
                "ta.updated_at",
            )
            ->where('ta.id', $article_id)
            ->join('t_members as tm', 'tm.id', 'ta.post_user')
            ->first()
            ->toArray();
        //  日付のフォーマット変更
        $dt = new Carbon($article["created_at"]);
        $article["created_at"] = $dt->format('Y/m/d');
        $dt = new Carbon($article["updated_at"]);
        $article["updated_at"] = $dt->format('Y/m/d');
        // 記事に設定されているタグを取得
        $t_tags = TArticleTag::from('t_article_tags as tat')
                ->where('article_id', $article_id)
                ->join("m_tags as mt", "mt.id", "tat.tag_id")
                ->get();
        // 閲覧数を1増加
        TArticle::where('id', $article_id)
            ->increment('number_views');
        
        return view('pages/knowledge/article')->with([
            "article" => $article,
            "t_tags" => $t_tags,
         ]);
    }
}