/*
* intialize time picker and bootstrap switch
*/
$('#timepicker_to').timepicker();
$('#timepicker_from').timepicker();
/*$("[name='live-checkbox']").bootstrapSwitch();

$("[name='live-checkbox']").on('switchChange.bootstrapSwitch', function(event, state) 
    {
        if (state == true) {
            $('#customgraph').hide();        
        } else {
            $('#customgraph').show();
        }
    });
*/
/*
* function create chart using high chart library
*/
$('#creategraph').click(function () { 
    var chart = Highcharts.chart('container', {

         chart: {
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function () {
                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function () {
                            var x = (new Date()).getTime(), // current time
                                y = 2; //Math.random();
                            series.addPoint([x, y], true, true);
                        }, 3000);
                    }
                }
            },

        title: {
            text: 'Chart.update'
        },

        subtitle: {
            text: 'Plain'
        },

        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },

        series: [{
            name: 'Temperature',
            data: (function () {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
                        i;

                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 1 
                        });
                    }
                    return data;
                }())
        }]

    });
});


/*
* ajax request to fetch data
*/
function getNodeData() { 
    $.ajax({
        type: "POST",
        url: "getdata",
        data: "user=success",
        success: function(msg){
            $(msg).appendTo("#edix");
        }
    });
    alert();
}
