@extends('layouts.mainLayout')
@section('loadStyle')
    <link rel="stylesheet" href="{{ asset('css/pages/top.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/article_list.css') }}">
@endsection
@section('loadJS')
    <script src="{{ asset('js/DoughnutChart.js') }}"></script>
@endsection

<!--ページタイトル指定-->
@section('title', 'Top')

    <!--Navigationbarタイトル指定-->
@section('nav_title', 'Top')

@section('main-container')

    <h1 class="logo font-decorated">IS IT</h1>
    <!--Meeting Block-->
    <div class="main">
        <div class="top-block-wrap">

            <div class="title-img">
                <img src="https://cdn.pixabay.com/photo/2015/01/08/18/27/startup-593341_960_720.jpg">
                <img class="cover">
                <i class="fas fa-users content"></i>
                <a class="go" href="#">勉強会ページへ
                    <i class="fas fa-arrow-right"></i>
                </a>
                <div class="content font-decorated">
                    <h1>Meeting</h1>
                    <h1>Schedules</h1>
                    <p>勉強会日程</p>
                </div>
            </div>

            <h2 class="block-wrap-title">近日開催</h2>

            <!--サンプル記事-->
            <div class="block article">

                <div class="date font-decorated">
                    <i class="far fa-calendar-alt"></i>
                    <p>2020/10/</p>
                    <p class="day">28 (Wed)</p>
                </div>

                <h2>
                    <a href="#">要件定義</a>
                </h2>
                <p>要件定義を行います。要件定義自体はwikiにあります。</p>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>設計</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>Mitsuoka Jobs</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--サンプル記事-->
            <div class="block article">

                <div class="date font-decorated">
                    <i class="far fa-calendar-alt"></i>
                    <p>2020/10/</p>
                    <p class="day">28 (Wed)</p>
                </div>

                <h2>
                    <a href="#">【基本設計】E-R図作成</a>
                </h2>
                <p>E-R図を作成します。 E-R図はexcelで作成後、wikiに添付します。</p>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>設計</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>Mitsuoka Jobs</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--サンプル記事-->
            <div class="block article">

                <div class="date font-decorated">
                    <i class="far fa-calendar-alt"></i>
                    <p>2020/10/</p>
                    <p class="day">28 (Wed)</p>
                </div>

                <h2>
                    <a href="#">【基本設計】画面レイアウト作成</a>
                </h2>
                <p>画面数などを確認するために 画面一覧と画面レイアウトを作成します。</p>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>設計</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>Mitsuoka Jobs</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Knowledge block-->
        <div class="top-block-wrap">
            <div class="title-img">
                <img src="https://cdn.pixabay.com/photo/2016/02/16/21/07/books-1204029_960_720.jpg">
                <img class="cover">
                <a class="go" href="#">なんちゃらページへ
                    <i class="fas fa-arrow-right"></i>
                </a>
                <i class="far fa-lightbulb content"></i>
                <div class="content font-decorated">
                    <h1>Knowledges</h1>
                    <p>知識共有</p>
                </div>
            </div>

            <h2 class="block-wrap-title">最近の投稿</h2>

            <!--サンプル記事-->
            <div class="block article">
                <h2>
                    <a href="#">暇なときに見るサイト</a>
                </h2>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>暇</p>
                    </a>
                    <a>
                        <p>サイト</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>Mitsuoka Jobs</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="far fa-eye"></i>
                            <p>1K views</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--サンプル記事-->
            <div class="block article">
                <h2>
                    <a href="#">Laravel環境構築手順)</a>
                </h2>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>PHP</p>
                    </a>
                    <a>
                        <p>Laravel</p>
                    </a>
                    <a>
                        <p>環境構築</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>mis_o_ramen</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="far fa-eye"></i>
                            <p>1K views</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--サンプル記事-->
            <div class="block article">
                <h2>
                    <a href="#">流行りのプログラミング言語2020(TOBIE)</a>
                </h2>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>プログラミング言語</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>mis_o_ramen</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="far fa-eye"></i>
                            <p>1K views</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--サンプル記事-->
            <div class="block article">
                <h2>
                    <a href="#">暇なときに見るサイト</a>
                </h2>
                <!--タグ-->
                <div class="tag-area ">
                    <a>
                        <p>暇</p>
                    </a>
                    <a>
                        <p>サイト</p>
                    </a>
                </div>
                <div>
                    <!--投稿者, 投稿日時, 更新日時-->
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="fas fa-user-edit"></i>
                            <p>Mitsuoka Jobs</p>
                        </div>
                        <div class="article-desc">
                            <p>1 day ago</p>
                        </div>
                    </div>
                    <div class="article-desc-wrap">
                        <div class="article-desc">
                            <i class="far fa-eye"></i>
                            <p>1K views</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block article">
            <div class="date">
                <i class="fas fa-chart-pie"></i>
                <h2 style="display: inline-block;">言語比率</h2>
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
