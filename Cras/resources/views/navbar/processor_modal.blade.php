
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
			<div id="pagination_modal">
				{{ $processors->links() }}
			</div>
		</form>
		<form role="form" name="form_addnewprocessor">
		    {{ csrf_field() }}
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<div class="form-group">
				<label for="processor_name">Processor name:</label>
				<input type="text" class="form-control" id="processorname" name="processor_name" placeholder="Processor name" required />	
			</div>
			<div class="form-group">
				<label for="mac">Mac address:</label>
				<input type="text" class="form-control" id="mac" name="mac" placeholder="Device MAC address" required />	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="btn_addprocessor">Add</button>
			</div>
		</form> 
	</div>
</div>
	