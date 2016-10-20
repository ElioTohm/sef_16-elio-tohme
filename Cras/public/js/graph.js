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
                // events: {
                //     load: function () {
                //         // set up the updating of the chart each second
                //         var series = this.series[0];
                //         setInterval(function () {
                //             var x = (new Date()).getTime(), // current time
                //                 y = Math.random();
                //             series.addPoint([x, y], true, true);
                //         }, 3000);
                //     }
                // }
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
                    getNodeData();
                    var data = 
                    [[0,0],[1,0],[2,0],[3,0],[4,0],[5,0],[0,0]];
                    return data;
                }())
        }]

    });
});


/*
* ajax request to fetch data
*/
function getNodeData() { 
    
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
    });
    $.ajax({
        type: "POST",
        url: "getdata",
        data: JSON.stringify({
                "fromtime" : 0,
                "totime" : 10,
            }),
        success: function(lol){
            alert(lol);
        }
    });
}
