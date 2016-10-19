<link href="{{url('/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{url('/css/bootstrap-switch.min.css')}}" rel="stylesheet"/>
<script src="{{url('/js/bootstrap-timepicker.min.js')}}"" type="text/javascript"></script>
<script src="{{url('/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<div class="form-inline menusection">
	
	<!-- <div id="customgraph" class="form-group" hidden="true">
		<div class="input-group bootstrap-timepicker timepicker">
		    <input id="timepicker_from" type="text" class="form-control input-small" >
		    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
		</div>
		<div class="input-group bootstrap-timepicker timepicker" >
	        <input id="timepicker_to" type="text" class="form-control input-small" type="">
	        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	    </div>
	    <input type="date" name="from-date">
	    <input type="date" name="to-date">
	</div> -->
	<div class="form-group">
		<label for="sel1">Select list:</label>
		<select class="form-control" id="charttype">
			<option>pie</option>
			<option>spline</option>
			<option>bar</option>
			<option>line</option>
		</select>
	</div>
	<button id="creategraph" type="button" class="btn btn-default pull-right">Create Graph</button>

</div>
<script src={{ url ("/js/graph.js")}} ></script>
