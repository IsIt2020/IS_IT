<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostArticleController extends Controller
{

    /**
     * ノウハウ記事投稿画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages/knowledge/post_article');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Post::create($request->all());
        return redirect('posts');
    }
}
