<link href="{{url('/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{url('/css/bootstrap-switch.min.css')}}" rel="stylesheet"/>
<script src="{{url('/js/bootstrap-timepicker.min.js')}}"" type="text/javascript"></script>
<script src="{{url('/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<div class="form-inline menusection">
	<div class="form-group">
		<label for="sel1">Select list:</label>
		<select class="form-control" id="charttype">
			<option>spline</option>
			<option>bar</option>
			<option>line</option>
		</select>
	</div>
	<button id="creategraph" type="button" class="btn btn-default pull-right">Create Graph</button>

</div>
<script src={{ url ("/js/graph.js")}} ></script>
