/**記事に目次を表示するフラグ */
var enableTOC = false;

//ページロード時はデフォルトで目次を非表示
$(window).on('load', function () {
    $('#enable-TOC').change();
});

$(function () {

    var value = $('#editor').val();
    //マークダウンからHTML生成
    $('#result').html(markdown(value));
    //コードハイライト
    highlightCode();

    //#region プレビュー表示
    //タイトル
    $('#title').keyup(function (e) {
        var str = sanitize($(this).val());
        $('#title-preview').html(str);
    });

    //サブタイトル
    $('#sub-title').keyup(function (e) {
        var str = sanitize($(this).val());
        $('#sub-title-preview').html(str);
    });

    //記事本文
    $('#editor').on('keyup focusout', function (e) {

        //Enterキー押下 or フォーカスアウトでプレビュー更新
        if (e.type=='keyup' && e.keyCode != 13) {
            return false;
        }

        var value = $(this).val();
        //マークダウンからHTML生成
        $('#result').html(markdown(value));

        //フラグがTrueの場合:目次生成　Falseの場合：目次エリアをクリア
        $('#headline').html(enableTOC ? createHeadline(value) : '');

        //コードハイライト
        highlightCode();
    });

    //目次　表示切替
    $('#enable-TOC').change(function () {
        enableTOC = $(this).prop('checked');
        //目次タグの表示切替
        setCssToMultipleTags('display', enableTOC ? 'block' : 'none', SelectorTypes.Class, 'headline-title', 'headline');
    });
    //#endregion

    //目次クリックで対象までスクロール
    var headerHight = 100;
    $('#headline').on('click', 'a[href^="#"]', function () {
        var speed = 500;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - headerHight;
        $('html,body').animate({ scrollTop: position }, speed, 'swing');
        return false;
    });

    //マークダウンタグボタン
    $('.markdown-btn').click(function () {

        /**editorオブジェクト*/
        let editor = $('#editor');

        //id取得
        var id = $(this).attr('id');

        //選択範囲取得
        var selectionRange = [
            editor.get(0).selectionStart,
            editor.get(0).selectionEnd ?? editor.get(0).selectionStart,
        ];

        /**追加するタグの配列*/
        var tags;

        /**追加方法　
         * 0:選択部分の前後にタグを追加
         * 1:選択部分の行の初めにタグを追加 */
        var taggingWay;

        //#region idをもとにタグ指定
        switch (id) {
            case 'bold':
                tags = ['**', '**'];
                taggingWay = 0;
                break;
            case 'italic':
                tags = ['*', '*'];
                taggingWay = 0;
                break;
            case 'del':
                tags = ['~~', '~~'];
                taggingWay = 0;
                break;
            case 'codeInline':
                tags = ['`', '`'];
                taggingWay = 0;
                break;
            case 'h1':
                tags = ['# ', ''];
                taggingWay = 0;
                break;
            case 'h2':
                tags = ['## ', ''];
                taggingWay = 0;
                break;
            case 'h3':
                tags = ['### ', ''];
                taggingWay = 0;
                break;
            case 'listDot':
                tags = ['- ', ''];
                taggingWay = 1;
                break;
            case 'listOrder':
                tags = ['1. ', ''];
                taggingWay = 1;
                break;
            case 'quote':
                tags = ['>', ''];
                taggingWay = 1;
                break;
            case 'code':
                tags = ['```', '```'];
                taggingWay = 0;
                break;
            case 'link':
                tags = ['[](', ')'];
                taggingWay = 0;
                break;
            case 'image':
                tags = ['![](', ')'];
                taggingWay = 0;
                break;
            case 'open-modal':
                tags = ['![](', ')'];
                taggingWay = 0;
                $('#cursor-positon').val(tags[0].length + selectionRange[0]);
                $('#modal-tag0-len').val(tags[0].length);
                $('#modal-tag1-len').val(tags[1].length);
                break;
        }
        //#endregion

        //#region タグ追加

        /**タグ追加後文字列*/
        var taggedVal;

        //選択部分の前後にタグを追加
        if (taggingWay == 0) {
            taggedVal = addTagsToFR(editor.val(), selectionRange, tags);
        }
        //選択部分の行の初めにタグを追加
        else if (taggingWay == 1) {
            taggedVal = addTagsToEachLines(editor.val(), selectionRange, tags);
        }

        editor.val(taggedVal);
        //#endregion

        //#region TextAreaにカーソルを戻す

        /**カーソル返却位置*/
        var cursorPos;

        if (taggingWay == 0) {
            //範囲選択の場合はカーソルを直後に移動
            //それ以外は追加したタグの内側にカーソルを移動
            cursorPos = selectionRange[0] == selectionRange[1] ?
                tags[0].length + selectionRange[0] :
                tags[0].length + tags[1].length + selectionRange[1];
        } else if (taggingWay == 1) {
            //カーソル位置：選択終了位置+改行回数*タグ文字数
            var brLen = editor.val().substr(selectionRange[0], selectionRange[1] - selectionRange[0]).split('\n').length;
            cursorPos = selectionRange[1] + (tags[0].length * brLen);
        }
        editor.get(0).setSelectionRange(cursorPos, cursorPos);
        editor.focus();

        //#endregion

        //プレビュー更新
        editor.keyup();
    });

    /**タグの追加 */
    $('#input-tag').keyup(function (event) {

        $('.tag-area').empty();

        var trimmedInput = escapeHtml($(this).val(), true);

        var tags = distinct(trimmedInput.split(' ').filter(x => x != ''));

        if (tags != void 0) {
            tags.forEach(x => {
                $('.tag-area').append(`<a><p>${x}</p></a>`);
            });
        }
    });
});

/**Array　重複要素除外 */
function distinct(array) {

    var distinctArray = [];

    array.forEach(x => {
        if (!distinctArray.includes(x)) {
            distinctArray.push(x);
        }
    });

    return distinctArray;
}

/**選択範囲の前後に値挿入
 *
 * @param {String} text 対象テキスト
 * @param {Array} range 選択範囲  配列[選択開始, 選択終了]
 * @param {Array} tags タグ  配列[直前に追加するタグ, 直後に追加するタグ]
 */
function addTagsToFR(text, range, tags) {
    return text.substr(0, range[0]) +
        tags[0] +
        text.substr(range[0], range[1] - range[0]) +
        tags[1] +
        text.substr(range[1]);
}

/**選択範囲の各行の初めに値挿入
 *
 * @param {String} text 対象テキスト
 * @param {Array} range 選択範囲  配列[選択開始, 選択終了]
 * @param {Array} tags タグ  配列[直前に追加するタグ, 直後に追加するタグ]
 */
function addTagsToEachLines(text, range, tags) {

    //選択前
    var before = text.substr(0, range[0]);
    //選択範囲
    var middle = text.substr(range[0], range[1] - range[0]).replaceAll('\n', '\n' + tags[0]);
    //選択後
    var after = text.substr(range[1]);

    return before + tags[0] + middle + after;
}
