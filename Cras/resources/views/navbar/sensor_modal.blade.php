<div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add a Sensor</h4>
		</div>
		<div class="modal-body">
			<form role="form" name="form_addnewsensor">
			    {{ csrf_field() }}
				<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
				<div id="sensorprocessor_pagination">
					@include('navbar.sensorsinfo')
				</div>
				<div class="form-group">
					<label for="select_processor">Select a processor:</label>
					<select class="form-control" processorselect>
						@foreach($allusersprocessors as $allprocessor)
							<option value="{{ $allprocessor->id }}" >{{ $allprocessor->processor_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="processor_name">Sensor type:</label>
					<input type="text" class="form-control" id="sensor_type" placeholder="Processor name" required />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn_addsensor">Add</button>
				</div>
			</form> 
		</div>
	</div>
</div>
<!-- javascript that handles add and delete for sensors -->
<script src={{ url ("/js/sensormodal.js")}} ></script>