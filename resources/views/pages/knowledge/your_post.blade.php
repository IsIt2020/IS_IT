@extends('layouts.mainLayout')

@section('loadStyle')
<link rel="stylesheet" href="{{ asset('css/pages/article_list.css') }}">

@endsection
@section('loadJS')
@endsection

<!--ページタイトル指定-->
@section('title', 'Your Post')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Your Post')

@section('main-container')
<div class="main-wrap">
    <!--表示切替用-->
    <input type="checkbox" id="show-search-option" style="display: none;">
    <form>
        <!-- 検索文字列-->
        <div class="block search">
            <i class="fas fa-search"></i>
            <!--検索文字列-->
            <input type="text" placeholder="記事を検索" class="search">

            <label for="show-search-option">
                <i class="far fa-calendar-alt"></i>
            </label>
        </div>
        <!-- 検索条件-->
        <div class="search-option-wrap">
            <div class="search-option">

                <div class="calendar font-decorated" id="calendar-1" data-date="2020-12"
                    data-available-days="2021-1-23 2020-12-1 2020-12-3 2020-12-5 2020-12-14 2020-12-15 2020-12-21 2020-12-24 2020-12-25 2020-12-31"
                    data-active-days="2021-1-23 2020-12-1 2020-12-3 2020-12-5 2020-12-14 2020-12-15 2020-12-21 2020-12-24 2020-12-25 2020-12-31">

                    <!--月切替ボタン-->
                    <div class="calendar-header">
                        <h1 class="current-date"></h1>
                        <button type="button" class="flip-calendar previous">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button type="button" class="flip-calendar next">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!--曜日-->
                    <div class="calendar-days day">
                    </div>
                    <!--日-->
                    <div class="calendar-days date">
                    </div>
                </div>
            </div>
        </div>
        <!-- ソート-->
        <div class="sort-by">
            <!--新しい順-->
            <input type="radio" name="sort-by" id="new-to-old" style="display: none;" checked>
            <!--古い順-->
            <input type="radio" name="sort-by" id="old-to-new" style="display: none;" >
            <label for="new-to-old" id="for-new-to-old">
                <p>新しい順</p>
            </label>
            <label for="old-to-new" id="for-old-to-new">
                <p>古い順</p>
            </label>
        </div>
    </form>
    <!--検索結果-->
    <div class="result">
        <h2>暇なときに</h2>
        <p>結果:{{count($articles)}}件</p>
    </div>

    <!--記事一覧-->
    <div class="articles">
        @foreach($articles as $article)
        <div class="block article">
            <h2>
                <a href="{{url('/knowledge/postArticle').'/'.$article["article_id"].'/edit'}}">{{$article["title"]}}</a>
            </h2>
            <button class="btn-show-delete">
                <i class="far fa-trash-alt"></i>
            </button>
            <button class="btn-delete">
                削除
            </button>
            <!--タグ-->
            <div class="tag-area ">
                @foreach($article["tags"] as $tag)
                <a>
                    <p>{{$tag["tag_name"]}}</p>
                </a>
                @endforeach
            </div>
            <div>
                <!--投稿者, 投稿日時, 更新日時-->
                <div class="article-desc-wrap">
                    <div class="article-desc">
                        <i class="far fa-calendar-plus"></i>
                        <p>{{$article["created_at"]}}</p>
                    </div>
                    <div class="article-desc">
                        <i class="fas fa-sync"></i>
                        <p>{{$article["updated_at"]}}</p>
                    </div>
                </div>
                <div class="article-desc-wrap">
                    <div class="article-desc">
                        <i class="far fa-eye"></i>
                        <p>{{$article["number_views"]}} views</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--記事投稿画面へ-->
    <form class="" action="{{url('/knowledge/postArticle')}}" method="get">
      <button class="post-new-article">
          <i class="fas fa-plus"></i>
      </button>
    </form>
</div>
@endsection
