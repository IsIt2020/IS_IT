//#region 定数
/**日付タグテンプレート*/
const tagTemplateDate = ({value, active, disabled}) => 
`<button ${active?'class="active"':''} ${disabled?'disabled':''}>${value}</button>`;

/**曜日タグテンプレート */
const tagTemplateDay = ({value}) => `<p>${value}</p>`;

const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
//#endregion

$(function(){
    $(window).on('load', function () {
        initializeAllTheCalendars();
    });

    //来月を表示
    $('.flip-calendar').on('click', function(){
        /** カレンダーオブジェクト*/
        var calendar = $(this).parent().parent();
        /**表示年月 */
        var date = new Date(calendar.data('date'));

        if($(this).attr('class').includes('next')){
            //来月に設定
            date = new Date(date.getFullYear(), date.getMonth()+1, 1);
        }
        else{
            date = new Date(date.getFullYear(), date.getMonth()-1, 1);
        }

        calendar.data('date', date.getFullYear()+ '-'+ (date.getMonth()+1));

        //更新
        initializeCalendar(calendar);
    });
});

/**ページ上のカレンダーを一括で初期化 */
function initializeAllTheCalendars(){    
    $('.calendar').each(function(){
        initializeCalendar($(this));        
    });
}

/**カレンダー初期化 
 * @param {object} calendar 対象のカレンダー
*/
function initializeCalendar(calendar) {
    /**対象のカレンダーID */
    var id = "#" + calendar.attr('id');

    /**表示年月 */
    var date = new Date(calendar.data('date'));
    /**利用可能日*/
    var availableDays = calendar.data('available-days').split(' ');
    /**有効日*/
    var activeDays = calendar.data('active-days').split(' ');
    /**月初曜日 */
    var startDate = date.getDay();
    /**月末曜日 */
    var endDate = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();
    /**月末日*/
    var dayLength = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    /**先月末日 */
    var dayLengthOfLastMonth = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

    //現在年月設置
    $(id + ' .current-date').text(months[date.getMonth()] + ' ' + date.getFullYear());

    //曜日生成
    var dayArea = $(id + ' .calendar-days.day');
    dayArea.empty();
    for(var i=0; i<7; i++){
        var day = days[i];
        dayArea.append(tagTemplateDay({value:day}));
    }

    //日付生成
    /**生成先オブジェクト */
    var dateArea = $(id + ' .calendar-days.date');
    dateArea.empty();

    //先月の日付生成
    for(var i=0; i<startDate; i++){
        let date = dayLengthOfLastMonth - startDate + i + 1;
        dateArea.append(tagTemplateDate({value:date, disabled:true}));
    }

    //今月の日付生成
    for(var i=0; i<dayLength; i++){
        var _date = date.getFullYear()+'-'+ (date.getMonth() + 1) +'-'+ (i+1);
        var disabled =  !availableDays.includes(_date);
        var active = activeDays.includes(_date);
        dateArea.append(tagTemplateDate({value:i+1, disabled:disabled, active:active}));
    }

    //来月の日付生成
    for(var i=0; i<6-endDate; i++){
        dateArea.append(tagTemplateDate({value:i+1, disabled:true}));
    }        
}