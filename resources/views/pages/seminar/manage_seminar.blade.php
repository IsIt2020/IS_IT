@extends('layouts.mainLayout')

@section('loadStyle')
<link rel="stylesheet" href="{{ asset('css/pages/post_article.css') }}">

@endsection
@section('loadJS')
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
<script src="{{ asset('js/pages/manageSeminar.js') }}"></script>
@endsection

<!--ページタイトル指定-->
@section('title', 'Manage Seminar')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Manage Seminar')

@section('main-container')
<div class="main">
        <div class="block-wrap">
            <form style="width: 100%;" name="register-seminar" action="{{ route('seminar.register') }}" method="POST">
                <div class="block compose meeting">

                    <!--タイトル-->
                    <h1 class="font-decorated">Title</h1>
                    <div class="input-field">
                        <input type="text" id="title" style="font-size: 1.5em;" class="article">
                    </div>

                    <!--本文-->
                    <h1 class="font-decorated">Content</h1>
                    <div class="input-field">
                        <textarea id="editor" class="meeting"></textarea>
                    </div>

                    <!--場所-->
                    <h1 class="font-decorated">Place</h1>
                    <div class="input-field">
                        <input type="text" placeholder="住所 建物名など">
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Google Mapsの共有リンク(任意)">
                    </div>
                    <div style="text-align: right">
                        <a href="https://www.google.co.jp/maps" target="_blank">Google Maps
                            <i class="fas fa-external-link-alt"></i></a>
                    </div>

                    <!--タグ-->
                    <h1 class="font-decorated">Tags</h1>
                    <div class="input-field">
                        <input type="text" id="input-tag" placeholder="スペース区切りでタグを追加   例: PHP Laravel">
                    </div>

                    <!--開催日時-->
                    <input type="checkbox" id="use-vote" name="use-vote" class="toggle-switch-cb">

                    <div style="display: flex;" class="use-vote-wrap">
                        <h1 class="font-decorated">Date & Time</h1>
                        <div style="margin: auto 0 0 auto; display: flex;">
                            <p style="margin-right: 10px;">投票を利用する</p>
                            <div class="toggle-switch-wrap" style="margin: auto;">
                                <label class="toggle-switch" for="use-vote"></label>
                                <label class="toggle-switch-bg" for="use-vote">
                                </label>
                            </div>
                        </div>
                    </div>

                    <!--投票を利用しない-->
                    <div class="dont-use-vote">
                        <div class="date-time">
                            <div class="date">
                                <div class="input-field">
                                    <input type="date" name="date">
                                </div>
                            </div>

                            <div class="time">
                                <div class="input-field time-start" title="開始時間">
                                    <input type="time" name="time-start">
                                </div>
                                <label class="tilde">~</label>
                                <div class="input-field time-end" title="終了時間">
                                    <input type="time" name="time-end">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--投票を利用する-->
                    <div class="use-vote">
                        <h3>選択肢を作成</h3>

                        <!--投票日時テーブル-->
                        <div id="options-material" class="schedule-date-table">

                            <!--投票選択肢　日付-->
                            <div class="schedule-date">
                                <p>投票可能期間</p>
                                <p>開催時間候補</p>

                                <div class="date">
                                    <div class="input-field">
                                        <input type="date" name="date-option-start">
                                    </div>
                                    <p class="tilde vertical">~</p>
                                    <div class="input-field">
                                        <input type="date" name="date-option-end">
                                    </div>
                                </div>
                                <div class="schedule-time-table">
                                    <!--投票選択肢　時間-->
                                    <div class="schedule-time">
                                        <button type="button" class="remove remove-time"></button>

                                        <div class="time">
                                            <div class="input-field time-start" title="開始時間">
                                                <input type="time" name="time-option-start" required>
                                            </div>
                                            <label class="tilde">~</label>
                                            <div class="input-field time-end" title="終了時間">
                                                <input type="time" name="time-option-end" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="schedule-time" title="時間を追加">
                                        <button type="button" class="add add-time" name="time-option"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="button-general ok" id="generate-options">作成</button>

                        <h3>選択肢を編集</h3>
                        <p id="no-options" style="text-align: center; margin: 20px auto;">選択肢が作成されていません</p>
                        <!--投票日時テーブル-->
                        <div id="options" class="schedule-date-table">

                            <div class="schedule-date edit" title="日付を追加">
                                <button type="button" class="add add-date"></button>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" class="button-general ok" id="submit">作成</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection