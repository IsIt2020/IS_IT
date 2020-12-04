@extends('layouts.mainLayout')
@section('loadStyle')
<link rel="stylesheet" href="{{ asset('css/pages/top.css') }}">
@endsection
@section('loadJS')
<script src="{{ asset('js/DoughnutChart.js') }}"></script>
@endsection

<!--ページタイトル指定-->
@section('title', 'Top')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Top')

@section('main-container')
<!--Meeting Block-->
<div class="main">
<div class="block-wrap">

    <div class="block">
        <img src="https://cdn.pixabay.com/photo/2015/01/08/18/27/startup-593341_960_720.jpg">
        <img class="cover">
        <i class="fas fa-users content"></i>
        <a class="go" href="#">勉強会ページへ
            <i class="fas fa-arrow-right"></i>
        </a>
        <div class="content">
            <h1>Meeting</h1>
            <h1>Schedules</h1>
            <p>勉強会日程</p>
        </div>
    </div>

    <h2>近日開催</h2>

    <!--Item-->
    <div class="item">
        <div class="date">
            <i class="far fa-calendar-alt"></i>
            <p>2020/10/</p>
            <p class="day">28 (Wed)</p>
        </div>
        <div class="content">
            <p>要件定義</p>
            <p class="description">要件定義を行います。要件定義自体はwikiにあります。
            </p>
            <p class="right place">仙台駅近辺</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>

    <!--Item-->
    <div class="item">
        <div class="date">
            <i class="far fa-calendar-alt"></i>
            <p>2020/10/</p>
            <p class="day">21 (Wed)</p>
        </div>
        <div class="content">
            <p>【基本設計】E-R図作成</p>
            <p class="description">E-R図を作成します。 E-R図はexcelで作成後、wikiに添付します。
            </p>
            <p class="right place">仙台駅近辺</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>

    <!--Item-->
    <div class="item">
        <div class="date">
            <i class="far fa-calendar-alt"></i>
            <p>2020/10/</p>
            <p class="day">28 (Wed)</p>
        </div>
        <div class="content">
            <p>【基本設計】画面レイアウト作成</p>
            <p class="description">画面数などを確認するために 画面一覧と画面レイアウトを作成します。
            </p>
            <p class="right place">仙台駅近辺</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>

    <!--Item-->
    <div class="item">
        <div class="date">
            <i class="far fa-calendar-alt"></i>
            <p>2020/10/</p>
            <p class="day">28 (Wed)</p>
        </div>
        <div class="content">
            <p>【基本設計】テーブル定義</p>
            <p class="description"></p>
            <p class="right place">仙台駅近辺</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>
</div>

<!--Knowledge Block-->
<div class="block-wrap">
    <div class="block">
        <img src="https://cdn.pixabay.com/photo/2016/02/16/21/07/books-1204029_960_720.jpg">
        <img class="cover">
        <a class="go" href="#">なんちゃらページへ
            <i class="fas fa-arrow-right"></i>
        </a>
        <i class="far fa-lightbulb content"></i>
        <div class="content">
            <h1>Knowledges</h1>
            <p>知識共有</p>
        </div>
    </div>

    <h2>最近の投稿</h2>

    <!--Item-->
    <div class="item">
        <div class="content">
            <div class="date">
                <i style="font-size: 20px;" class="fas fa-paperclip"></i>
                <a href="#">Laravel環境構築手順</a>
            </div>
            <p class="right user">misoramen</p>
            <p class="right">2020/10/XX</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>

    <!--Item-->
    <div class="item">
        <div class="content">
            <div class="date">
                <i style="font-size: 20px;" class="fas fa-paperclip"></i>
                <a href="#">流行りのプログラミング言語2020(TOBIE)</a>
            </div>
            <p class="right user">misoramen</p>
            <p class="right">2020/10/XX</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>

    <!--Item-->
    <div class="item">
        <div class="content">
            <div class="date">
                <i style="font-size: 20px;" class="fas fa-paperclip"></i>
                <a href="#">Winows</a>
            </div>
            <p class="right user">misoramen</p>
            <p class="right">2020/10/XX</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>

    <!--Item-->
    <div class="item">
        <div class="content">
            <div class="date">
                <i style="font-size: 20px;" class="fas fa-paperclip"></i>
                <a href="#">Laravel環境構築手順</a>
            </div>
            <p class="right user">misoramen</p>
            <p class="right">2020/10/XX</p>
        </div>
        <div class="tag-area">
            <a href="#">
                <p>環境構築</p>
            </a>
            <a href="#">
                <p>PaaaaHP</p>
            </a>
        </div>
    </div>
</div>

<div class="item">
    <div class="content">
        <div class="date">
            <i class="fas fa-chart-pie"></i>
            <p>言語比率</p>
        </div>
    </div>
    <div class="chart-area">
        <div class="chart">
            <canvas id='chart'></canvas>
            <p class="achieve">32,767</p>
        </div>
        <!--凡例動的追加欄-->
        <div id="chart-legends"></div>
    </div>
</div>
</div>

@endsection
