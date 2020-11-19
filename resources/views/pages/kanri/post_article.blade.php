@extends('layouts.mainLayout')

@section('loadStyle')
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/atom-one-dark.min.css">
<link rel="stylesheet" href="{{ asset('css/pages/post_article.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@endsection
@section('loadJS')
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
<script src="../js/post_article.js"></script>
@endsection

<!--ページタイトル指定-->
@section('title', 'Post Article')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Post Article')

@section('main-container')
<div class="row">
  <div class="post-edit-container col-lg-6 col-sm-12 p-0">
    <div class="text-right mb-3">
      <button type="button" name="" id="l-btn" class="btn btn-dark"><</button>
    </div>
    <div class="row mx-3">
      <div id="" class="post-tab editTab col-2 p-0 tab-active">
        <button type="button" name="" id="" class="btn showEditBtn w-100 h-100">EDIT</button>
      </div>
      <div id="" class="post-tab previewTab col-2 p-0">
        <button type="button" name="" id="" class="btn showPrevieBtn w-100 h-100">PREVIEW</button>
      </div>
    </div>
    <div class="edit-erea mx-3 mb-3 p-3">
      <form name="post-form" class="" action="{{-- route('posts.create') --}}" method="post">
        <!-- タイトル -->
        <div class="form-group">
          <label for="input-title">Title</label>
          <input type="text" class="form-control" id="input-title" placeholder="タイトル">
        </div>
        <!-- サブタイトル -->
        <div class="form-group">
          <label for="input-sub-title">Sub-Title</label>
          <input type="text" class="form-control" id="input-sub-title" placeholder="サブタイトル">
        </div>
        <!-- 内容 -->
        <div class="form-group">
          <label for="textarea-content">Content</label>
          <textarea class="form-control" id="textarea-content" rows="20"></textarea>
        </div>
        <!-- 記事ステータス -->
        <div class="form-group">
          <label for="exampleFormControlSelect1">Status</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>公開</option>
            <option>一時保存</option>
          </select>
        </div>
        <!-- 投稿ボタン -->
        <div class="form-group text-right">
          <button id="post-btn" type="button" name="button" class="btn btn-dark">投稿</button>
        </div>
      </form>
    </div>
  </div>
  <div class="v_line_fix"></div>
  <div class="post-preview-container col p-0 container-hidden">
    <div class="text-left mb-3 h-auto">
      <button type="button" name="" id="r-btn" class="btn btn-dark">></button>
    </div>
    <div class="row mx-3">
      <div id="" class="post-tab editTab col-2 p-0 tab-active">
        <button type="button" name="" id="" class="btn showEditBtn w-100 h-100">EDIT</button>
      </div>
      <div id="" class="post-tab previewTab col-2 p-0">
        <button type="button" name="" id="" class="btn showPrevieBtn w-100 h-100">PREVIEW</button>
      </div>
    </div>
    <div class="preview-erea mx-3 mb-3 p-3">
      <div class="border-bottom pre-title-container">
        <h1 id="pre-title"></h1>
      </div>
      <div id="pre-content" class="pre-content-container">
      </div>
    </div>
  </div>
</div>
@endsection
