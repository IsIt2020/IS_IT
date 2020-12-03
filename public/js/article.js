//#region テスト用記事本文

/**テスト用記事本文*/
const testContent = '記事投稿画面\n' +
    '暫定のデザインができたので上げます。\n' +
    '\n' +
    'このテキストをコピーして、\n' +
    'post_article.htmlの”Content”欄に貼っつけてみてください。\n' +
    '他にも、プレビューのタブ切り替え、タイトル、サブタイトル、タグなど\n' +
    '試してみてください。\n' +
    '\n' +
    '見出し\n' +
    '\n' +
    '# 見出し1\n' +
    '## 見出し2\n' +
    '### 見出し3\n' +
    '\n' +
    '## 箇条書きリスト\n' +
    '\n' +
    '- リスト1\n' +
    '    - ネスト リスト1_1\n' +
    '        - ネスト リスト1_1_1\n' +
    '        - ネスト リスト1_1_2\n' +
    '    - ネスト リスト1_2\n' +
    '- リスト2\n' +
    '- リスト3\n' +
    '\n' +
    '## 番号リスト\n' +
    '1. 番号付きリスト1\n' +
    '    1. 番号付きリスト1_1\n' +
    '    1. 番号付きリスト1_2\n' +
    '1. 番号付きリスト2\n' +
    '1. 番号付きリスト3\n' +
    '\n' +
    '## 引用\n' +
    '> お世話になります。xxxです。\n' +
    '> \n' +
    '> ご連絡いただいた、バグの件ですが、仕様です。\n' +
    '\n' +
    '## n重引用\n' +
    '> お世話になります。xxxです。\n' +
    '> \n' +
    '> ご連絡いただいた、バグの件ですが、仕様です。\n' +
    '>> お世話になります。 yyyです。\n' +
    '>> \n' +
    '>> あの新機能バグってるっすね\n' +
    '\n' +
    '## インラインコード\n' +
    'Hello World `printf("Hello World");`\n' +
    '\n' +
    '## コード\n' +
    '```\n' +
    '        function (i, block) {\n' +
    '            $(block).text(unsanitize($(block).text()));\n' +
    '            hljs.highlightBlock(block);\n' +
    '        }\n' +
    '```\n' +
    '\n' +
    '## 斜体\n' +
    'アスタリスクもしくはアンダースコア1個で文字列を囲むことで*強調*します。\n' +
    '見た目は斜体になります。\n' +
    '\n' +
    '## 太字\n' +
    'アスタリスクもしくはアンダースコア2個で文字列を囲むことで**強調**にします。\n' +
    '見た目は太字になります。\n' +
    '\n' +
    '## 取り消し線\n' +
    '~~取り消し線~~\n' +
    '\n' +
    '\n' +
    '\n' +
    '## リンク\n' +
    '[Google](https://www.google.co.jp/)\n' +
    '\n' +
    '## 線\n' +
    '***\n' +
    '\n' +
    '##画像\n' +
    '![代替テキスト](https://cdn.pixabay.com/photo/2014/05/02/21/50/laptop-336378_960_720.jpg)';
//#endregion

$(function () {

    $(window).on('load', function () {
        loadArticle(testContent, true);
    });

    //目次クリックで対象までスクロール
    var headerHight = 100;
    $('#headline').on('click', 'a[href^=#]', function () {
        var speed = 500;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - headerHight;
        $('html,body').animate({ scrollTop: position }, speed, 'swing');
        return false;
    });
})

/**
 * 記事のロード
 * @param {String} content 本文
 * @param {boolean} showTOC 目次を表示する
 */
function loadArticle(content, showTOC) {

    //マークダウンHTML変換
    $('#result').html(markdown(content));

    //コードハイライト
    highlightCode();

    //目次表示 フラグがTrueの場合:目次生成　Falseの場合：目次エリアをクリア
    $('#headline').html(showTOC ? createHeadline(content) : '');

    //目次の表示切替
    setCssToMultipleTags('display', showTOC ? 'block' : 'none', SelectorTypes.Class, 'headline-title', 'headline');

}