/**目次自動生成 */
function createHeadline(html) {

    //#region HTMLタグ リテラル 
    /** olタグ*/
    const ol = ['<ol type="1">', '</ol>'];

    /** ulタグ*/
    const ul = ['<ul>', '</ul>'];
    /**追加するタグの形式*/
    const tagTemplate = ({ id, text }) => `<li><a href=#${id}>${text}</a></li>`;
    //#endregion

    /**目次*/
    var headlines = ol[0];

    //"#"がついている行(見出し行)を取得
    var lines = html.split('\n').filter(x => x.match(/^#+ /));

    //見出し行から目次を生成
    lines.forEach(x => {
        //ヘッダーの種類取得(h1 or h2 or h3)
        var num = x.split('#').length - 1;

        //内容
        var text = x.replace(/#/g, '').substr(1);
        //id
        var id = text.replace(/[ 　]/g, '-').toLowerCase();

        //目次を追加
        //h2, h3はネストして表示する
        switch (num) {
            case 1:
                headlines += tagTemplate({ id: id, text: text });
                break;
            case 2:
                headlines += ul[0] + tagTemplate({ id: id, text: text }) + ul[1];
                break;
            case 3:
                headlines += ul[0] + ul[0] + tagTemplate({ id: id, text: text }) + ul[1] + ul[1];
                break;
        }
    });
    headlines += ol[1];

    return headlines;
}

/**マークダウンからHTML生成 */
function markdown(value) {
    //">"は引用タグに使用するので仕方なくエスケープしない
    var src = escapeHtml(value).replaceAll('&gt;', '>');
    return marked(src, { "breaks": true });
}

/**コードのハイライト */
function highlightCode() {
    $('code').each(function (i, block) {
        $(block).text(unsanitize($(block).text()));
        hljs.highlightBlock(block);
    });
}

//#region XSS対策

/**エスケープ
 * @param {String} str 対象文字列
 * @param {boolean} replaceWithBlank true:空文字に置換 false:エスケープ文字に置換
*/
function escapeHtml(str, replaceWithBlank = false) {
    if (replaceWithBlank) {
        return str.replace(/[&<>"']/g, '');
    }
    else {
        return str.replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }
}

/**HTMLタグ無効化*/
function sanitize(html) {
    return $('<div />').text(html).html();
}

/**HTMLタグ有効化*/
function unsanitize(html) {
    return $('<div />').html(html).text();
}
//#endregion