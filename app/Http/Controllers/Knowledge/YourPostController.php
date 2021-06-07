<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TArticle;
use App\Models\TArticleTag;
use Carbon\Carbon;

class YourPostController extends Controller
{

    /**
     * your post画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ログインユーザーを取得
        $post_user = Auth::user()->id;
        // 記事の種類を定義
        $article_kind = config('const.db.m_article_kinds.knowledge.ID');
        // 対象ユーザーが作成したlnowledge記事を一覧で取得
        $articles = TArticle::from('t_articles as ta')
            ->select(
                "ta.id as article_id",
                "ta.title",
                "ta.sub_title",
                "ta.number_views",
                "ta.created_at",
                "ta.updated_at",
            )
            ->where('article_kind',$article_kind)
            ->where('post_user',$post_user)
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
        // その他の情報を付加
        for($i = 0; $i < count($articles); $i++){
            // タグ情報を付加
            $article_id = $articles[$i]["article_id"];
            $t_tags = TArticleTag::from('t_article_tags as tat')
                ->where('article_id', $article_id)
                ->join("m_tags as mt", "mt.id", "tat.tag_id")
                ->get()
                ->toArray();
            $articles[$i]["tags"] = $t_tags;

            //  日付のフォーマット変更
            $dt = new Carbon($articles[$i]["created_at"]);
            $articles[$i]["created_at"] = $dt->format('Y/m/d');
            $dt = new Carbon($articles[$i]["updated_at"]);
            $articles[$i]["updated_at"] = $dt->format('Y/m/d');
        }
        
        return view('pages/knowledge/your_post', compact('articles'));
    }
}
