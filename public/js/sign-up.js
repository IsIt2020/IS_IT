$(function() {

    $('#name, #email, #pass').focusout(function() {

        var id = $(this).attr('id');
        var state = $(this).val() == '';

        //スタイルの切替
        SwitchClass(state, "wrong", SelectorTypes.Id, id);
        //エラーラベルの表示切替
        var errorLabelId = id + '-error-label';
        SwitchClass(true, 'visible', SelectorTypes.Id, errorLabelId);
        //警告文の設置
        SetText(state ? '必須項目です' : '', SelectorTypes.Id, errorLabelId);
    });

    $('#birthyear, #birthmonth, #birthday').focusout(WrongBirthdate);

    /**空欄チェック */
    function HasBlank() {
        var blank_name = ($('#name').val() == '');
        var blank_email = ($('#email').val() == '');
        var blank_pass = ($('#pass').val() == '');

        //エラーラベルの表示切替
        SwitchClass(blank_name, "wrong", SelectorTypes.Id, 'name-error-label');
        SwitchClass(blank_email, "wrong", SelectorTypes.Id, 'email-error-label');
        SwitchClass(blank_pass, "wrong", SelectorTypes.Id, 'pass-error-label');

        //警告文の設置
        SetText(blank_name ? '必須項目です' : '', SelectorTypes.Id, 'name');
        SetText(blank_email ? '必須項目です' : '', SelectorTypes.Id, 'email');
        SetText(blank_pass ? '必須項目です' : '', SelectorTypes.Id, 'pass');

        return (blank_name || blank_email || blank_pass);
    }

    /**日付チェック */
    function WrongBirthdate() {
        var errorLabelId = 'birthdate-error-label';

        var year = $('#birthyear').val();
        var month = $('#birthmonth').val();
        var day = $('#birthday').val();

        var hasBlank = (year == '' || month == '' || day == '');

        //スタイルの切替
        SwitchClass(hasBlank, "wrong", SelectorTypes.Id, 'birthyear', 'birthmonth', 'birthday');
        //エラーラベルの表示切替
        SwitchClass(true, 'visible', SelectorTypes.Id, errorLabelId);
        //警告文の設置
        SetText(hasBlank ? '必須項目です' : '', SelectorTypes.Id, errorLabelId);

        if (hasBlank) {
            return true;
        }

        var minYear = 1900;
        var date = new Date(year, month - 1, day);

        var invalidDate = (date.getFullYear() != year ||
            date.getMonth() != month - 1 ||
            date.getDate() != day ||
            Number(new Date().getFullYear()) < year ||
            Number(year) < Number(minYear));

        //スタイルの切替
        SwitchClass(invalidDate, "wrong", SelectorTypes.Id, 'birthyear', 'birthmonth', 'birthday');
        //エラーラベルの表示切替
        SwitchClass(true, 'visible', SelectorTypes.Id, errorLabelId);
        //警告文の設置
        SetText(invalidDate ? '入力形式が正しくありません' : '', SelectorTypes.Id, errorLabelId);

        //空欄時のみボタンを無効化
        if (invalidDate) {
            return true;
        }

        return false;
    }

    /**
     * Submit前チェック
     */
    $('#btn-confirm').click(function() {

        if (HasBlank() || WrongBirthdate()) {
            return false;
        }
        $('#form_confirm').submit();
    });

    //#region パスワード表示切替
    $('#show-pass')
        .on('mousedown touchstart', function() {
            $('#pass').attr('type', 'text');
        })
        .on('mouseup touchend', function() {
            $('#pass').attr('type', 'password');
        });

    $('#show-pass2')
        .on('mousedown touchstart', function() {
            $('#pass2').attr('type', 'text');
        })
        .on('mouseup touchend', function() {
            $('#pass2').attr('type', 'password');
        });
    //#endregion

    //Radiobutton再クリックで解除
    var checkedItem = $('input[name=gender]:checked').val();
    $('#genderM, #genderF').click(function() {
        if ($(this).val() === checkedItem) {
            $(this).prop('checked', false);
            checkedItem = false;
        } else {
            checkedItem = $(this).val();
        }
    })
})