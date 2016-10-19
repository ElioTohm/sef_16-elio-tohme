<!-- Modal content-->
<div class="modal-dialog ">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add a Node</h4>
		</div>
		<div class="modal-body">
			<form role="form" name="form_editprocessor">
			    {{ csrf_field() }}
				<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
				@foreach ($processors as $processor)
					<div class="form-inline well" processorid="{{ $processor->id }}">
						<div class="row">
							<input type="text" class="form-control" name="processorname" value="{{ $processor->processor_name }}" processorid="{{ $processor->id }}" disabled>	
							<input type="text" class="form-control" name="mac" value="{{ $processor->auth_key }}" processorid="{{ $processor->id }}" disabled>	
							<div class="form-group">
								<button type="button" class="btn btn-default" processorid="{{ $processor->id }}">Edit</button>	
								<button type="button" class="btn btn-warning" hidden="true" processorid="{{ $processor->id }}" processormac="{{ $processor->mac }}" processorname="{{ $processor->processor_name }}">Cancel</button>
								<button type="button" class="btn btn-danger" processorid="{{ $processor->id }}" delete="processor">Delete</button>
							</div>
									
						</div>
					</div>
				@endforeach
				<div id="pagination_modal">
					{{ $processors->links() }}
				</div>
			</form>
		</div>
	</div>
</div>

<!-- data manipulation script for processor modal -->
<script src={{ url ("/js/editprocessor.js")}} ></script>