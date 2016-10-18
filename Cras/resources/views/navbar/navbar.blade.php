@section('navbar')
<div id="sidebar">
	<div id="navbar" class="sidenav">
	  <a class="menubtn" id="menubtn" ><span class="glyphicon glyphicon-menu-hamburger"></span></a>
	  <!-- List of processors -->
		<div class="form-inline menusection">
			<span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#model_editprocessor"></span>
			<span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#model_addprocessor"></span>
			<b><u>
			<h8>Nodes</h8>
			</b></u>
			@include('navbar.navbar_processorlist')
		</div>	
	  <!-- list of sensors -->
		<div class="form-inline menusection">
			<span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#model_editsensors"></span>
			<span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#model_addsensors"></span>
			<b><u>
			<h8>Sensors</h8>
			</b></u>
			<div>
			</div>
			<div id="sensor_list">
				@include('navbar.navbar_sensorslist')
			</div>
			
		</div>

		<!-- graph action section -->
		<div class="form-inline menusection">
			<button type="button" class="btn btn-default">Monitor</button>
		</div>
	</div>
	<!-- Modal/edit for procesors -->
	<div id="model_editprocessor" class="modal fade" role="dialog">
		@include('navbar.edit_processor_modal')
	</div>
	<!-- Modal/add for procesors -->
	<div id="model_addprocessor" class="modal fade" role="dialog">
		@include('navbar.add_processor_modal')
	</div>
	<!-- Modal/add for sensors -->
	<div id="model_addsensors" class="modal fade" role="dialog">
		@include('navbar.add_sensor_modal')
	</div>	
	<!-- Modal/edit for sensors -->
	<div id="model_editsensors" class="modal fade" role="dialog">
		@include('navbar.edit_sensor_modal')
	</div>	
</div>

<!-- main javascript file for navbar -->
<script src={{ url ("/js/monitoring.js")}} ></script>

@endsection