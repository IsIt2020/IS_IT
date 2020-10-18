$(function () {

    //#region 空欄チェック
    $('#name, #email, #pass').focusout(function () {

        var id = $(this).attr('id');
        var state = $(this).val() == '';

        //スタイルの切替
        SwitchClass(state, "wrong", SelectorTypes.Id, id);
        //エラーラベルの表示切替
        var errorLabelId = id + '-error-label';
        SwitchClass(true, 'visible', SelectorTypes.Id, errorLabelId);
        //警告文の設置
        SetText(state ? '必須項目です' : '', SelectorTypes.Id, errorLabelId);

        //必須項目が全て入力された場合確認ボタンを有効化
        var btnDisabled = (
            $('#name').val() == '' ||
            $('#email').val() == '' ||
            $('#birthyear').val() == '' ||
            $('#birthmonth').val() == '' ||
            $('#birthday').val() == '' ||
            $('#pass').val() == '' ||
            $('#pass2').val() == '');
        SwitchDisabled(btnDisabled, SelectorTypes.Id, "btn-confirm");
    });
    //#endregion

    //#region 生年月日 入力チェック
    $('#birthyear, #birthmonth, #birthday').focusout(function () {

        var errorLabelId = 'birthdate-error-label';

        var year = $('#birthyear').val();
        var month = $('#birthmonth').val();
        var day = $('#birthday').val();

        if (year == '' || month == '' || day == '') {
            //スタイルの切替
            SwitchClass(true, "wrong", SelectorTypes.Id, 'birthyear', 'birthmonth', 'birthday');
            //エラーラベルの表示切替
            SwitchClass(true, 'visible', SelectorTypes.Id, errorLabelId);
            //警告文の設置
            SetText('必須項目です', SelectorTypes.Id, errorLabelId);
            return;
        }

        var minYear = 1900;
        var date = new Date(year, month - 1, day);

        var state = (
            date.getFullYear() != year ||
            date.getMonth() != month - 1 ||
            date.getDate() != day ||
            Number(new Date().getFullYear()) < year ||
            Number(year) < Number(minYear));

        //スタイルの切替
        SwitchClass(state, "wrong", SelectorTypes.Id, 'birthyear', 'birthmonth', 'birthday');
        //エラーラベルの表示切替
        SwitchClass(true, 'visible', SelectorTypes.Id, errorLabelId);
        //警告文の設置
        SetText(state ? '入力形式が正しくありません' : '', SelectorTypes.Id, errorLabelId);

        //空欄時のみボタンを無効化
        if (state) {
          SwitchDisabled(state, SelectorTypes.Id, "btn-confirm");
          $('#birthdate').val("");
        }else{
          // hidden要素に生年月日を設定
          $('#birthdate').val(year+'/'+month+'/'+day);
        }

    });
    //#endregion

    //#region パスワード表示切替
    $('#show-pass')
        .mousedown(function () {
            $('#pass').attr('type', 'text');
        })
        .mouseup(function () {
            $('#pass').attr('type', 'password');
        });
    //#endregion

    //Radiobutton再クリックで解除
    var checkedItem =  $('input[name=gender]:checked').val();
    $('#genderM, #genderF').click(function(){
        if($(this).val()===checkedItem){
            $(this).prop('checked', false);
            checkedItem = false;
        } else{
            checkedItem = $(this).val();
        }
    });
})
