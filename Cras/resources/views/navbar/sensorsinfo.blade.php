<div class="form-group well" processorid="{{ $processor->id }}">
	<div class="row">
		<div class="col-sm-5">
			<input type="text" class="form-control" name="mac" value="{{ $processor->processor_name }}" disabled>
		</div>
		<div class="col-sm-5">
			<select class="form-control inline-inputselect" sensorsselector>
				@foreach ($processor->sensors as $sensor)
					<option value="{{ $sensor->sensor_id }}" selected>{{ $sensor->sensor_type }}</option>
				@endforeach
			</select>	
		</div>
		<div class="col-sm-1">
			<button type="button" class="btn btn-danger" processorid="{{ $processor->id }}">
				<span class="glyphicon glyphicon-trash">Delete</span>
			</button>	
		</div>
	</div>
</div>
