<div class="form-group well">
	<div class="row">
		<div class="col-sm-5">
			<input type="text" class="form-control" name="mac" value="{{ $processor->processor_name }}" disabled>
		</div>
		<div class="col-sm-5">
			<select class="form-control inline-inputselect" id="select_processor">
				@foreach ($processor->censors as $censor)
					<option value="{{ $censor->censor_id }}" >{{ $censor->censor_type }}</option>
				@endforeach
			</select>	
		</div>
		<div class="col-sm-1">
			<button type="button" class="btn btn-danger">
				<span class="glyphicon glyphicon-trash">Delete</span>
			</button>	
		</div>
	</div>
</div>
