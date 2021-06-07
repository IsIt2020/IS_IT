<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TArticle;
use App\Models\MArticleStatus;
use App\Models\MTag;
use App\Models\TArticleTag;
use App\Http\Requests\Knowledge\PostArticleRequest;
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
        // タグ一覧取得
        $m_tags = MTag::get();

        return view('pages/knowledge/post_article')->with([
            "article_statuses" => $article_statuses,
            "m_tags" => $m_tags,
         ]);
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
        // タグ一覧取得
        $m_tags = MTag::get();
        // 記事に設定されているタグを取得
        $t_tags = TArticleTag::where('article_id', $article_id)->get();
        // 対象記事を取得
        $article = TArticle::where('id',$article_id)->first();
        return view('pages/knowledge/post_article')->with([
            "article_statuses" => $article_statuses,
            "article" => $article,
            "m_tags" => $m_tags,
            "t_tags" => $t_tags,
         ]);;
    }
    
    /**
     * 投稿記事を保存
     *
     * @return \Illuminate\View\View
     */
    public function store(PostArticleRequest $request)
    {
        // 記事を保存
        $t_article = TArticle::create([
            'article_kind' => config('const.db.m_article_kinds.knowledge.ID'),
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
            'post_user' => Auth::user()->id,
            'status_id' => $request->status_id,
            'number_views' => 0,
        ]);

        // タグの保存
        $this->saveTag($request, $t_article->id);

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
        // 記事の更新
        $t_article = TArticle::where('id', $article_id)
            ->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'content' => $request->content,
                'status_id' => $request->status_id,
            ]);
        
        // タグの保存
        $this->saveTag($request, $article_id);
        
        return redirect('/knowledge/yourPost');
    }

    private function saveTag(Request $request, $article_id)
    {
        // タグ関連処理
        if($request->has('tags')){
            // 記事に設定されているタグを一度削除
            TArticleTag::where('id', $article_id)->delete();
            // タグを取得
            $tag_ary = $request->tags;
            // 記事IDとタグIDのペアでDBに保存
            foreach ($tag_ary as $tag) {
                TArticleTag::create([
                    'article_id' => $article_id,
                    'tag_id' => $tag
                ]);
            }
        }
    }
}
