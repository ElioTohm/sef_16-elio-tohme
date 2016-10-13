
@section('navbarmodal')
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
					<div class="form-group">
						@each('navbar.processormodal', $processors, 'processor')
					</div>
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
</div>

@endsection