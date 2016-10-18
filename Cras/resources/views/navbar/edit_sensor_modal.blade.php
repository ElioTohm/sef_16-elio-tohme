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
			</form> 
		</div>
	</div>
</div>
<!-- javascript that handles add and delete for sensors -->
<script src={{ url ("/js/editsensor.js")}} ></script>