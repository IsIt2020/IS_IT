@extends('layouts.mainLayout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('loadStyle')
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/atom-one-dark.min.css">
<link rel="stylesheet" href="{{ asset('css/components/article.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/post_article.css') }}">
@endsection
@section('loadJS')
<script src="{{ asset('js/pages/article.js') }}"></script>
<script src="{{ asset('js/lib/marked.js') }}"></script>
<script src="{{ asset('js/lib/highlight.pack.js') }}"></script>
<script src="{{ asset('js/lib/ArticleControl.js') }}"></script>
<!-- ここから file upload用のscript -->
@component('components.fileUploadScript')
@endcomponent
<!-- ここまで file upload用のscript -->
@endsection

<!--ページタイトル指定-->
@section('title', 'Post Article')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Post Article')

@section('main-container')
<div class="main">
    <div class="block-wrap">
        <div class="block">

            <div class="title">{{$article->title}}</div>
            <div class="sub-title article"></div>
            <div class="tag-area">
                <a>
                    <p>Laravel</p>
                </a>
            </div>

            <div class="article-desc-wrap">
                <div class="article-desc">
                    <i class="fas fa-user-edit"></i>
                    <p>{{$article->user_name}}</p>
                </div>
                <div class="article-desc">
                    <i class="far fa-calendar-plus"></i>
                    <p>{{$article->created_at}}</p>
                </div>
                <div class="article-desc">
                    <i class="fas fa-sync"></i>
                    <p>{{$article->updated_at}}</p>
                </div>
            </div>

            <!--目次格納用-->
            <input type="checkbox" style="display: none;" id="fold-TOC">
            <div class="headline-title" style="display: none;">
                <i class="fas fa-list"></i>
                <p>目次</p>
                <label for="fold-TOC" id="hide-TOC">非表示</label>
                <label for="fold-TOC" id="show-TOC">表示</label>
            </div>
            <div id="headline" class="headline" style="display: none">
            </div>

            <div id="result" class="article main">
            {{$article->content}}
            </div>
        </div>
    </div>
</div>
@endsection
