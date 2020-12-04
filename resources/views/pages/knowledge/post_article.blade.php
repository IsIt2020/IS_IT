@extends('layouts.mainLayout')

@section('loadStyle')
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/atom-one-dark.min.css">
<link rel="stylesheet" href="{{ asset('css/components/article.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/post_article.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/code-hilight.css') }}">

@endsection
@section('loadJS')
<script src="{{ asset('js/post_article.js') }}"></script>
<script src="{{ asset('js/lib/marked.js') }}"></script>
<script src="{{ asset('js/lib/highlight.pack.js') }}"></script>
<script src="{{ asset('js/lib/ArticleControl.js') }}"></script>
@endsection

<!--ページタイトル指定-->
@section('title', 'Post Article')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Post Article')

@section('main-container')
<div class="main">

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="insertImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container upload-container">
          <div class="row">
            <div class="col-lg-3">
              a
            </div>
            <div class="col-lg-3">
              a
            </div>
            <div class="col-lg-3">
              a
            </div>
            <div class="col-lg-3">
              a
            </div>
            <div class="col-lg-3 image-upload" style="border:bold;">

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--表示切替用-->
<input type="radio" name="display-type" id="preview">
<input type="radio" name="display-type" id="edit" checked>
<input type="radio" name="display-type" id="both">

<!--表示切替タブ-->
<div class="tab-area font-decorated">
    <label id="tab-both" for="both" style="background: transparent; box-shadow: none;" title="横並び表示">
        <i class="fas fa-columns"></i>
    </label>
    <label id="tab-edit" for="edit" title="編集">Edit</label>
    <label id="tab-preview" for="preview" title="プレビュー">Preview</label>
</div>

<!--投稿ブロック-->
<div class="block-wrap">
    <div class="block compose">
        <h1 class="font-decorated">Title</h1>
        <div class="input-field">
            <input type="text" id="title" style="font-size: 1.5em;" class="article">
        </div>

        <h1 class="font-decorated">Sub Title</h1>
        <div class="input-field">
            <input type="text" id="sub-title" style="font-size: 1.5em;" class="article">
        </div>

        <div style="display: flex;">
            <h1 class="font-decorated">Content</h1>
            <div style="margin: auto 0 0 auto; display: flex;">
                <p style="margin-right: 10px;">目次を表示</p>
                <div class="toggle-switch-wrap" style="margin: auto;">
                    <input type="checkbox" id="enable-TOC" class="toggle-switch-cb">
                    <label class="toggle-switch" for="enable-TOC"></label>
                    <label class="toggle-switch-bg" for="enable-TOC">
                    </label>
                </div>
            </div>
        </div>

        <div class="markdown font-decorated">
            <button class="markdown-btn" id="bold" title="Bold"><b>B</b></button>
            <button class="markdown-btn" id="italic" title="Italic"><i>I</i></button>
            <button class="markdown-btn" id="del" title="Remove Line"><del>S</del></button>
            <button class="markdown-btn" id="codeInline" title="Inline Code">C</button>
            <button class="markdown-btn" id="h1" title="Heading 1">H1</button>
            <button class="markdown-btn" id="h2" title="Heading 2">H2</button>
            <button class="markdown-btn" id="h3" title="Heading 3">H3</button>
            <button class="markdown-btn" id="listDot" title="Unorderd List">
                <i class="fas fa-list-ul"></i></button>
            <button class="markdown-btn" id="listOrder" title="Ordered List">
                <i class="fas fa-list-ol"></i></button>
            <button class="markdown-btn" id="quote" title="Quote">
                <i class="fas fa-quote-right"></i></button>
            <button class="markdown-btn" id="code" title="Hilighted Code">
                <i class="fas fa-code"></i></button>
            <button class="markdown-btn" id="link" title="Link">
                <i class="fas fa-link"></i></button>
            <button class="markdown-btn" id="image" title="Image">
                <i class="far fa-file-image"></i></button>

            <button type="button" class="markdown-btn" data-toggle="modal" data-target="#insertImageModal">
                <i class="fas fa-file-upload"></i></button>
        </div>

        <div class="input-field">
            <textarea id="editor" class="article"></textarea>
        </div>

        <h1 class="font-decorated">Tags</h1>
        <div class="input-field">
            <input type="text" id="input-tag" placeholder="スペース区切りでタグを追加   例: PHP Laravel">
        </div>

        <div class="input-field">

            <select name="submission-type" style="height: 40px;">
                <option value="public">公開</option>
                <option value="draft">下書き保存(非公開)</option>
            </select>
        </div>

        <div style="text-align: right;">
            <button class="button-general ok">投稿</button>
        </div>
    </div>

    <!--プレビューブロック-->
    <div class="block preview">
        <div id="title-preview" class="title article"></div>
        <div id="sub-title-preview" class="sub-title article"></div>
        <div class="tag-area"></div>

        <!--目次格納用-->
        <input type="checkbox" style="display: none;" id="fold-TOC">
        <div class="headline-title">
            <i class="fas fa-list"></i>
            <p>目次</p>
            <label for="fold-TOC" id="hide-TOC">非表示</label>
            <label for="fold-TOC" id="show-TOC">表示</label>
        </div>
        <div id="headline" class="headline"></div>
        <div id="result" class="article main"></div>
    </div>
</div>
</div>
@endsection
