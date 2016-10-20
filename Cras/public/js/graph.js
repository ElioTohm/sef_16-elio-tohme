/*
* intialize time picker and bootstrap switch
*/
$('#timepicker_to').timepicker();
$('#timepicker_from').timepicker();
/*
* function create chart using high chart library
*/
$('#creategraph').click(function () { 
    var array = [];

    var charttype = $("#charttype").val();
    
    getNodeData(array);

    var chart = Highcharts.chart('container', {

         chart: {
                type: charttype,
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
            },

        title: {
            text: 'Node 1'
        },
        series: [{
                name: 'node',
                data: (function () {
                    // generate an array of random data
                    var data = [];

                    for(var key in array){
                        data.push(array[key]);
                    }
                    return data;
                }())
            }],
        tooltip: {
                formatter: function () {
                    return Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x);
                }
            },

    });
});


/*
* ajax request to fetch data
*/
function getNodeData(array) { 
    
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
    });

    $.ajax({
        type: "POST",
        url: "getdata",
        async: false,
        data: JSON.stringify({
                "fromtime" : 0,
                "totime" : 30,
            }),
        success: function(data){
            var result = data.result;
            for (var key in result) {
                var object = JSON.parse(result[key]);
                array.push([object.timestamp,parseInt(object.measurement)]);
            }          
            return array;
        }
    });

}
