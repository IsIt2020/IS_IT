<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TArticle;

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
        $post_user = Auth::user()->member_id;
        // 記事の種類を定義
        $article_kind = config('const.db.m_article_kinds.knowledge.ID');
        // 対象ユーザーが作成したlnowledge記事を一覧で取得
        $articles = TArticle::where('article_kind',$article_kind)
            ->where('post_user',$post_user)
            ->orderBy('article_id', 'desc')
            ->get();
        
        return view('pages/knowledge/your_post', compact('articles'));
    }
}
