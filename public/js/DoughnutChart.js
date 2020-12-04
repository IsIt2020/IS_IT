
//チャート描画色
var colors = ["#003d9f", "#0066d0", "#1b9744", "#59c871", "#ffd330", "#dda226", "#eb4435", "#b1010c"];
//本番はこんな感じで
//var data = @json($data);
var data = {
    name: ["Java", "PHP", "C#", "JavaScript", "C", "Objective-C"],
    value: [30, 25, 15, 13, 10, 7],
};

//#region チャート初期化
function InitChart(data) {
    var chart = new Chart($('#chart'), {
        type: 'doughnut',
        data: {
            labels: data.name,
            datasets: [{
                backgroundColor: colors,
                data: data.value,
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 80,
            legend: {
                display: false,
            },
            tooltips: {
                enabled: false,
            }
        },

    });

    //#region Legend追加
    for (i = 0; i < data.value.length; i++) {

        var legend = `<div class="legend">
                <div class="color-pan" style='background:` + colors[i] + `'></div>
                <p class="text">` + data.name[i] + `</p>
                <p class="percentage">` + data.value[i] + `</p>
            </div>`;

        $('#chart-legends').append(legend);
    }
    //#endregion
}
//#endregion

$(function() {
    InitChart(data);
});