//#region 定数

//#region 時間選択肢タグ
/**時間選択肢タグ
 * @param timeStart 開始時間
 * @param timeEnd 終了時間
 */
const tagTemplateTimeOption = ({ timeStart, timeEnd }) =>
    `
    <!--投票選択肢　時間-->
    <div class="schedule-time">
        <button type="button" class="remove remove-time"></button>

        <div class="time">
            <div class="input-field time-start" title="開始時間">
                <input  type="time" value="${timeStart}" name="time-option-start" required>
            </div>
            <label class="tilde">~</label>
            <div class="input-field time-end" title="終了時間">
                <input  type="time" value="${timeEnd}" name="time-option-end" required>
            </div>
        </div>
    </div>`;
//#endregion

//#region 選択肢タグ
/**選択肢タグ　上
 * @param value  日付
*/
const tagTemplateOptionOpen = ({ date }) =>
    `    <!--投票選択肢　日付-->
    <div class="schedule-date edit">
        <button type="button" class="remove remove-date"></button>
        <div class="date">
            <div class="input-field">
                <input  type="date" value="${date}">
            </div>
        </div>
        <div class="schedule-time-table">`;

/**選択肢タグ　下*/
const tagTemplateOptionClose =
    `       <div class="schedule-time" title="時間を追加">
                <button type="button" class="add add-time option"></button>
            </div>
        </div>
    </div>`;

//#endregion
//#endregion

$(function () {

    //削除ボタン表示切替
    switchVisibilityOfAllTheRemoveButtons();

    //時間追加ボタン押下
    $('.schedule-date-table').on('click', '.add-time', function () {
        $(this).parent().before(tagTemplateTimeOption({}));

        //削除ボタン表示切替
        switchVisibilityOfRemoveButton($(this).parent().parent());
    });

    //日付追加ボタン押下
    $('.add-date').click(function () {

        var html =
            tagTemplateOptionOpen({}) +
            tagTemplateTimeOption({}) +
            tagTemplateOptionClose;
        $(this).parent().parent().prepend(html);

        //削除ボタン表示切替
        switchVisibilityOfAllTheRemoveButtons();

        //「選択肢が作成されていません」表示切替
        $('#no-options').css('display', $('#options').find('.schedule-date').length > 1 ? 'none' : 'block');
    });

    //時間削除ボタン押下
    $('.schedule-date-table').on('click', '.remove-time', function () {

        //削除前に親オブジェクト(単一選択肢ブロック)取得
        var parent = $(this).parent().parent();

        //時間選択肢を削除
        $(this).parent().remove();

        //削除ボタン表示切替
        switchVisibilityOfRemoveButton(parent);
    });

    //日付削除ボタン押下
    $('.schedule-date-table').on('click', '.remove-date', function () {

        //日付選択肢を削除
        $(this).parent().remove();

        //「選択肢が作成されていません」表示切替
        $('#no-options').css('display', $('#options').find('.schedule-date').length > 1 ? 'none' : 'block');
    });

    //選択肢生成
    $('#generate-options').click(function () {
        //投票選択肢の生成
        generateVoteOptions();

        //削除ボタン表示切替
        switchVisibilityOfAllTheRemoveButtons();

        //「選択肢が作成されていません」表示切替
        $('#no-options').css('display', $('#options').find('.schedule-date').length > 1 ? 'none' : 'block');
    });

    /*  Submit前処理 
        時間選択肢の名前を整形してPHP側で配列として受け取れるようにする
    */
    $('#submit').click(function () {

        $.each($('#options input[type="time"]'), function (index, element) {
            var date = $(element).parent().parent().parent().parent().parent().find('input[type="date"]').val();
            if (date == '') {
                alert('日付が入力されていません');
                return false;
            }
            var currentName = $(this).prop('name').replace(/\[.*\]/, '');
            var newName = currentName + '[' + date + ']';

            $(this).prop('name', newName);
        });

        //空欄チェック
        //投票を利用する場合
        if($('input[name="use-vote"]').prop('checked')){

             //選択肢が作成されていない場合中断
            if($('#options input[type="date"]').length == 0) {
                alert('開催日時の選択肢が作成されていません');
                return false;
            }

            $.each($('#options input[type="time"]'), function (index, element) {
                if($(element).val() == '') {
                    alert('時間が入力されていません');
                    return false;
                }
            });
        }
        //投票を利用しない場合
        else {
            if( $('input[name="date"]').val() == '' ||
                $('input[name="time-start"]').val() == '' ||
                $('input[name="time-end"]').val() == '') {
                    alert('日時が入力されていません');
                    return false;
            }           
        }

        $('form[name="register-seminar"]').submit();
    });
});

/**投票選択肢の生成*/
function generateVoteOptions() {
    //投票可能期間、時間選択肢の取得

    //投票可能期間
    var dateOptionStart = new Date($('#options-material').find('input[name="date-option-start"]').val());
    var dateOptionEnd = new Date($('#options-material').find('input[name="date-option-end"]').val());

    //開催時間選択肢
    var timeOptionsStart = [];
    var timeOptionsEnd = [];
    $('#options-material').find('input[name="time-option-start"]').each(function () {
        timeOptionsStart.push($(this).val());
    });
    $('#options-material').find('input[name="time-option-end"]').each(function () {
        timeOptionsEnd.push($(this).val());
    });
    //#endregion

    //HTMLタグ生成
    /**追加するHTMLタグ文字列 */
    var html = '';

    /**追加する日数 */
    var dayLen = (dateOptionEnd - dateOptionStart) / 86400000;

    for (let i = 0; i < dayLen + 1; i++) {

        //開始日から1日ずつ追加する
        var _dateOption = new Date(dateOptionStart);
        _dateOption.setDate(_dateOption.getDate() + i);
        //yyyy-mm-dd形式
        var dateOption =
            _dateOption.getFullYear() + '-' +
            ('00' + (_dateOption.getMonth() + 1)).slice(-2) + '-' +
            ('00' + (_dateOption.getDate())).slice(-2);

        //日付生成
        html += tagTemplateOptionOpen({ date: dateOption });

        //時間生成
        for (let j = 0; j < timeOptionsStart.length; j++) {

            html += tagTemplateTimeOption({ timeStart: timeOptionsStart[j], timeEnd: timeOptionsEnd[j] });
        }
        html += tagTemplateOptionClose;
    }
    $('#options').prepend(html);
}

/**時間選択肢削除ボタン表示切替 
 * @param {Object} obj ボタンオブジェクト
*/
function switchVisibilityOfRemoveButton(obj) {
    //選択肢の個数が追加ボタンも含め2以下の場合、削除ボタンを非表示
    obj.find('.remove').css('visibility', obj.find('.schedule-time').length <= 2 ? 'collapse' : 'visible');
}

/**時間選択肢削除ボタン一括表示切替 */
function switchVisibilityOfAllTheRemoveButtons() {
    $.each($('.schedule-time-table'), function (index, element) {
        $(element).find('.remove').css('visibility', $(element).find('.schedule-time').length <= 2 ? 'collapse' : 'visible');
    });
}