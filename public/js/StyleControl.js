/**セレクタの種類*/
var SelectorTypes = {
    Id: '#',
    Class: '.',
}

/**
 * 複数タグのクラス付与切替
 * @param {boolean} state true:付加 false:削除
 * @param  {string} addClass 付与、削除するクラス名  
 * @param {SelectorTypes} type セレクタの種類
 * @param  {...string} selectors 指定タグ 
 */
function SwitchClass(state, addClass, type, ...selectors) {
    if (state) {
        for (var i=0; i<selectors.length; i++) {
            $(type + selectors[i]).addClass(addClass);
        }
    } else {
        for (var i=0; i<selectors.length; i++) {
            $(type + selectors[i]).removeClass(addClass);
        }
    }
}

/**
 * 複数タグのDisabled切替
 * @param {boolean} state true:Disabled=true false:Disabled=false
 * @param {SelectorTypes} type セレクタの種類
 * @param  {...string} selectors 指定タグ 
 */
function SwitchDisabled(state, type, ...selectors) {
    for (var i=0; i<selectors.length; i++) {
        $(type + selectors[i]).prop('disabled', state);
    }
}

/**
 * 複数タグのHTMLテキスト設置
 * @param {string} text 設置テキスト
 * @param {SelectorTypes} type セレクタの種類
 * @param  {...string} selectors 指定タグ 
 */
function SetText(text, type, ...selectors) {
    for (var i=0; i<selectors.length; i++) {
        $(type + selectors[i]).html(text);
    }
}

/**
 * 複数タグのCSSプロパティ一括設定
 * @param {string} property CSSプロパティ
 * @param {string} value 値
 * @param {SelectorTypes} type セレクタの種類
 * @param  {...string} selectors 指定タグ 
 */
function setCssToMultipleTags(property, value, type, ...selectors) {
    for(var i=0; i< selectors.length; i++){
        $(type + selectors[i]).css(property, value);
    }
  }