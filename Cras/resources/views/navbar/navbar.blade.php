@section('navbar')
<div id="sidebar">
	<div id="navbar" class="sidenav">
	  <a class="menubtn" id="menubtn" ><span class="glyphicon glyphicon-menu-hamburger"></span></a>
	  <!-- List of processors -->
		<div class="form-inline menusection">
			<div>
				<h6><b><u><a data-toggle="modal" data-target="#model_addprocessor">Processors</a></u></b></h6>
			</div>
			@include('navbar.navbar_processorlist')
		</div>	
	  <!-- list of sensors -->
		<div class="form-inline menusection">
				<h6><b><u><a data-toggle="modal" data-target="#model_addsensors">Sensors</a></u></b></h6>
			<div>
			</div>
			<div class="list-group">
				@if (count($processors))
					@foreach ($processors as $processor)
						@foreach ($processor->sensors as $sensor)
							<a class="list-group-item active" sensorid="{{ $sensor->sensor_id }}"
							sensors_processor="{{$processor->id}}">
								{{ $sensor->sensor_type }}
							</a>
						@endforeach
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<!-- Modal for procesors -->
	<div id="model_addprocessor" class="modal fade in" role="dialog">
		@include('navbar.processor_modal')
	</div>

	<!-- Modal for sensors -->
	<div id="model_addsensors" class="modal fade" role="dialog">
		@include('navbar.sensor_modal')
	</div>	

</div>

<!-- main javascript file for navbar -->
<script src={{ url ("/js/monitoring.js")}} ></script>

@endsection