<div class="form-inline well" processorid="{{ $processor->id }}">
	<div class="row">
		<input type="text" class="form-control" name="processorname" value="{{ $processor->processor_name }}" processorid="{{ $processor->id }}" disabled>	
		<input type="text" class="form-control" name="mac" value="{{ $processor->mac }}" processorid="{{ $processor->id }}" disabled>	
		<div class="form-group">
			<button type="button" class="btn btn-default" processorid="{{ $processor->id }}">Edit</button>	
			<button type="button" class="btn btn-warning" hidden="true" processorid="{{ $processor->id }}" processormac="{{ $processor->mac }}" processorname="{{ $processor->processor_name }}">Cancel</button>
			<button type="button" class="btn btn-danger" processorid="{{ $processor->id }}" delete="processor">Delete</button>
		</div>
				
	</div>
</div>
