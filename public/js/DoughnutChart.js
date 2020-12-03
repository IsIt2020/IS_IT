var colors = ['#007bff', '#28a745', '#333333', '#c3e6cb', '#dc3545', '#6c757d'];

//本番はこんな感じで
//var data = @json($data);
var data = [
    ["Java", "PHP", "C#", "JavaScript"],
    [38, 31, 21, 10],
];

function InitChart(data) {
    var chart = new Chart($('#chart'), {
        type: 'doughnut',
        data: {
            labels: data[0],
            datasets: [{
                backgroundColor: colors,
                data: data[1],
                borderWidth: 0,
            }]
        },
        options: {
            cutoutPercentage: 85,
            legend: {
                position: 'bottom',
                labels: {
                    pointStyle: 'square',
                    usePointStyle: true
                }
            },
        },

    });
}
$(function() {
    InitChart(data);
});