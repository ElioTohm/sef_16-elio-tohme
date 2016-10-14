@section('navbar')
<!-- Style sheet -->

<div id="sidebar">
<div id="navbar" class="sidenav">
  <a class="menubtn" id="menubtn" ><span class="glyphicon glyphicon-menu-hamburger"></span></a>
  <!-- List of processors -->
	<div class="form-inline menusection">
		<div>
			<h6><b><u><a data-toggle="modal" data-target="#model_addprocessor">Processors</a></u></b></h6>
		</div>
		<div class="list-group">
			@if (count($processors))
				@foreach ($processors as $processor)
					<a class="list-group-item active"> 
						{{ $processor->processor_name}}
					</a>
				@endforeach
			@endif
		</div>
	</div>	
  <!-- list of sensors -->
	<div class="form-inline menusection">
		<div>
			<h6><b><u><a data-toggle="modal" data-target="#model_addcensors">Censors</a></u></b></h6>
		</div>
		<div>

		</div>
	</div>
</div>
<!-- Modal for procesors -->
<div id="model_addprocessor" class="modal fade" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add a Processor</h4>
			</div>
			<div class="modal-body">
				<form role="form" name="form_editprocessor">
				    {{ csrf_field() }}
					<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
					@each('navbar.processormodal', $processors, 'processor')
				</form> 
				<form role="form" name="form_addnewprocessor">
				    {{ csrf_field() }}
					<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
					<div class="form-group">
						<label for="processor_name">Processor name:</label>
						<input type="text" class="form-control" name="processor_name" placeholder="Processor name" required />	
					</div>
					<div class="form-group">
						<label for="mac">Mac address:</label>
						<input type="text" class="form-control" name="mac" placeholder="Device MAC address" required />	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="btn_addprocessor">Add</button>

					</div>
				</form> 
			</div>
		</div>
	</div>
</div>

<!-- Modal for censors -->
<div id="model_addcensors" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
		    <h4 class="modal-title">Add a Censor</h4>
		  </div>
		  <div class="modal-body">
			<form role="form" name="form_addnewprocessor">
			    {{ csrf_field() }}
				<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
					@each('navbar.sensorsinfo', $processors, 'processor')
				<div class="form-group">
					<label for="sel1">Select a processor:</label>
					<select class="form-control" id="select_processor">
						@foreach($processors as $processor)
							<option id="{{ $processor->processor_id }}">{{ $processor->processor_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="processor_name">Censor type:</label>
					<input type="text" class="form-control" name="processor_name" placeholder="Processor name" required />	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn_addprocessor">Add</button>
				</div>
			</form> 
		  </div>
		</div>
	</div>
</div>	
</div>

<script src={{ url ("/js/monitoring.js")}} ></script>

@endsection