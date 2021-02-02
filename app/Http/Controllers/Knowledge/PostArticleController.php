<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TArticle;

class PostArticleController extends Controller
{

    /**
     * ノウハウ記事投稿画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $article_kind = config('const.db.m_article_kinds.knowledge.ID');

        return view('pages/knowledge/post_article', compact('article_kind'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_user' => 'required',
            'article_kind' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        TArticle::create([
            'article_kind' => $request->article_kind,
            'title' => $request->title,
            'content' => $request->content,
            'post_user' => $request->post_user,
            'status_id' => $request->status_id,
            'number_views' => 0,
        ]);
        return redirect('/knowledge/yourPost');
    }
}
