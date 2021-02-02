$(function () {

    $(window).on('load', function () {
        loadArticle($('#result').text(), true);
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