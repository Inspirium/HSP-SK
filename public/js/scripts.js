if (document.getElementById('chart1')) {
    axios.get('/api/home')
        .then((res) => {
            new Chartist.Bar('#chart1', {
                labels: ['Propozicija', 'Pro. na odobrenju', 'Priprema teksta', 'Dizajn', 'Prijelom', 'Priprema', 'Tisak'],
                series: res.data,
            }, {
                scaleMinSpace: 100
            });
        });
}
/*
new Chartist.Line('#chart2', {
    labels: ['Propozicija', 'Pro. na odobrenju', 'Priprema teksta', 'Dizajn', 'Prijelom', 'Def. cijene', 'Priprema', 'Tisak'],
    series: [[11, 2, 11, 5, 23, 15, 15, 1]]
});

var data = {
    labels: ['Bananas', 'Apples', 'Grapes'],
    series: [20, 15, 40]
};
var options = {
    labelInterpolationFnc: function(value) {
        return value[0]
    }
};
var responsiveOptions = [
    ['screen and (min-width: 640px)', {
        chartPadding: 30,
        labelOffset: 20,
        labelDirection: 'explode',
        labelInterpolationFnc: function(value) {
            return value;
        }
    }],
    ['screen and (min-width: 1024px)', {
        labelOffset: 40,
        chartPadding: 20
    }]
];
new Chartist.Pie('#chart3', data, options, responsiveOptions);


new Chartist.Pie('#chart4', {
    series: [20, 10, 30, 40]
}, {
    donut: true,
    donutWidth: 60,
    donutSolid: true,
    startAngle: 270,
    showLabel: true
});
*/