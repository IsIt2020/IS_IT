/**
 * セレクタの種類
 */
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
        for (var selector of selectors) {
            $(type + selector).addClass(addClass);
        }
    } else {
        for (var selector of selectors) {
            $(type + selector).removeClass(addClass);
        }
    }
}
/**
 * 複数タグのDisabled切替
 * @param {boolean} state 
 * @param {SelectorTypes} type 
 * @param  {...string} selectors 
 */
function SwitchDisabled(state, type, ...selectors) {
    for (var selector of selectors) {
        $(type + selector).prop('disabled', state);
    }
}
/**
 * 複数タグのHTMLテキスト設置
 * @param {string} text
 * @param {SelectorTypes} type 
 * @param  {...string} selectors 
 */
function SetText(text, type, ...selectors) {
    for (var selector of selectors) {
        $(type + selector).html(text);
    }
}