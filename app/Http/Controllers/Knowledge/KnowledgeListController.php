<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TArticle;
use App\Models\TArticleTag;
use Carbon\Carbon;

class KnowledgeListController extends Controller
{
    /**
     * ノウハウ記事一覧画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 記事の種類を定義
        $article_kind = config('const.db.m_article_kinds.knowledge.ID');
        // knowledge記事を一覧で取得
        $articles = TArticle::from('t_articles as ta')
            ->select(
                "ta.id as article_id",
                "ta.title",
                "ta.sub_title",
                "tm.user_name",
                "ta.number_views",
                "ta.created_at",
            )
            ->join('t_members as tm', 'tm.id', 'ta.post_user')
            ->where('article_kind',$article_kind)
            ->where('ta.is_deleted',false);
        // 検索条件で絞り込み
        $search_terms = [];
        // 検索文字列(search-str)
        if($request->filled("search-str")){
            $articles = $articles->whereLike('ta.title',$request->input("search-str"));
            $search_terms["search-str"] = $request->input("search-str");
        }
        // ソート
        $search_terms["sort-by-date"] = "";
        $search_terms["sort-by-views"] = "";
        if($request->filled("sort-by")){
            switch ($request->input("sort-by")) {
                case 'date':
                    $articles = $articles->orderBy('ta.created_at', 'desc');
                    $search_terms["sort-by-date"] = "checked";
                    break;
                case 'views':
                    $articles = $articles->orderBy('ta.number_views', 'desc');
                    $search_terms["sort-by-views"] = "checked";
                    break;
                default:
                    break;
            }
        }else{
            $articles = $articles->orderBy('ta.created_at', 'desc');
            $search_terms["sort-by-date"] = "checked";
        }

        $articles = $articles->orderBy('tm.id', 'desc')
            ->limit(4)
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

            // 投稿日時情報
            $created_at = $articles[$i]["created_at"];
            $dt = new Carbon($created_at);
            $articles[$i]["post_date"] = $dt->format('Y年m月d日 G:i');
        }
        
        return view('pages/knowledge/knowledge_list')->with([
            "articles" => $articles,
            "search_terms" => $search_terms,
         ]);
    }
}
