<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TArticle;
use App\Models\MArticleStatus;

class PostArticleController extends Controller
{

    /**
     * ノウハウ記事投稿画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 記事ステータス一覧を取得
        $article_statuses = MArticleStatus::get();
        return view('pages/knowledge/post_article', compact('article_statuses'));
    }

    /**
     * ノウハウ記事投稿画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function edit($article_id)
    {
        // 記事ステータス一覧を取得
        $article_statuses = MArticleStatus::get();
        // 対象記事を取得
        $article = TArticle::where('article_id',$article_id)->first();
        return view('pages/knowledge/post_article', compact('article_statuses','article'));
    }
    
    /**
     * 投稿記事を保存
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // 記事を保存
        $t_article = TArticle::create([
            'article_kind' => config('const.db.m_article_kinds.knowledge.ID'),
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
            'post_user' => Auth::user()->member_id,
            'status_id' => $request->status_id,
            'number_views' => 0,
        ]);
        // タグ関連処理
        // タグを取得
        $tags = $request->tags;
        // スペースで分割
        $tag_ary = explode(" ",$tags);
        foreach ($tag_ary as $tag) {
            
        }

        return redirect('/knowledge/yourPost');
    }

    /**
     * 投稿記事を保存
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $article_id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $t_article = TArticle::where('article_id', $article_id)
            ->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'content' => $request->content,
                'status_id' => $request->status_id,
            ]);
        return redirect('/knowledge/yourPost');
    }
}
