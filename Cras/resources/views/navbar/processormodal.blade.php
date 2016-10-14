<div class="form-group well">
	<div class="row">
		<div class="col-sm-4">
			<input type="text" class="form-control" name="processor_name" value="{{ $processor->processor_name }}" disabled>	
		</div>
		<div class="col-sm-4">
			<input type="text" class="form-control" name="mac" value="{{ $processor->mac }}" disabled>	
		</div>
		<div class="form-inline">
			<button type="button" class="btn btn-default">Edit</button>	
			<button type="button" class="btn btn-danger">Delete</button>	
		</div>
	</div>
</div>
