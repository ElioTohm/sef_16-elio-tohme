/*
* intialize time picker and bootstrap switch
*/
$('#timepicker_to').timepicker();
$('#timepicker_from').timepicker();
var Graphdata = [];
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
        success: function(data){
            $parsedData = JSON.parse(data);
            for (var k in parsedData){
                Graphdata.push([k,data]);
            }
            alert(Graphdata);
        }
    });
}
