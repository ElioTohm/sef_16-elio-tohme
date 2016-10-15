<div class="form-inline well">
	<div class="row">
		<input type="text" class="form-control" name="processor_name" value="{{ $processor->processor_name }}" processorid="{{ $processor->processor_id }}" disabled>	
		<input type="text" class="form-control" name="mac" value="{{ $processor->mac }}" processorid="{{ $processor->processor_id }}" disabled>	
		<div class="form-group">
			<button type="button" class="btn btn-default" processorid="{{ $processor->processor_id }}">Edit</button>	
			<button type="button" class="btn btn-warning" hidden="true" processorid="{{ $processor->processor_id }}" processormac="{{ $processor->mac }}" processorname="{{ $processor->processor_name }}">Cancel</button>
			<button type="button" class="btn btn-danger" processorid="{{ $processor->processor_id }}">Delete</button>
		</div>
				
	</div>
</div>
