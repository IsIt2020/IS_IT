@extends('layouts.mainLayout')
@section('loadStyle')
    <link rel="stylesheet" href="{{ asset('css/pages/article_list.css') }}">
@endsection
@section('loadJS')
    <script src="{{ asset('js/DoughnutChart.js') }}"></script>
@endsection

<!--ページタイトル指定-->
@section('title', 'Top')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Knowledge記事一覧')

@section('main-container')

<div class="main-wrap">
    <form method="GET" action="{{url('knowledge/list')}}">
        <!--検索文字列-->
        <div class="block search">
            <button type="submit">
                <i class="fas fa-search"></i>
            </button>
            <!--検索文字列-->
            <input type="text" name="search-str" placeholder="記事を検索" class="search"
             value="{{isset($search_terms['search-str']) ? $search_terms['search-str'] : '' }}">
        </div>
        <!--ソート-->
        <div class="sort-wrap">
            <!--新着順-->
            <input type="radio" name="sort-by" value="date" id="sort-by-date" style="display: none;" {{$search_terms['sort-by-date']}}>
            <!--閲覧数順-->
            <input type="radio" name="sort-by" value="views" id="sort-by-views" style="display: none;" {{$search_terms['sort-by-views']}}>
            <button id="show-sort" type="button">
                <i class="fas fa-sort-amount-down"></i>
            </button>
            <div class="sort">
                <label for="sort-by-date" id="for-sort-by-date">
                    <p>新着順</p>
                </label>
                <label for="sort-by-views" id="for-sort-by-views">
                    <p>ページビュー順</p>
                </label>
            </div>
        </div>
    </form>

    <!--検索結果-->
    <div class="result">
    @if(isset($search_terms["search-str"]))
        <h2>{{$search_terms["search-str"]}}</h2>
    @endif
        <p>結果:{{count($articles)}}件</p>
    </div>

    <!--記事一覧-->
    <div class="articles">
    @foreach($articles as $article)
    <div class="block article">
            <h2>
                <a href="{{url('knowledge/article').'/'.$article["article_id"].'/'}}">{{$article["title"]}}</a>
            </h2>
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
                        <i class="fas fa-user-edit"></i>
                        <p>{{$article["user_name"]}}</p>
                    </div>
                    <div class="article-desc">
                        <p>{{$article["post_date"]}}</p>
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
</div>

@endsection
