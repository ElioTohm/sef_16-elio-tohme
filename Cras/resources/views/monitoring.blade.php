@extends('layouts.app')

@section('monitoringGraph')

<!-- Styles -->
<link href={{ url ("/css/monitoring.css")}} rel="stylesheet">

<div id="navbar" class="sidenavclosed">
  <a href="javascript:void(0)" class="menubtn" id="menubtn" >&#9776;</a>
  <!-- List of processors -->
  <div>
	  <div class="menusection">
	  	<h3>Processors</h3>
	  	<div></div>
	  </div>	
  </div>
  <!-- list of sensors -->
  <div>
  	<div class="menusection">
  		<h3>Sensors</h3>
  	</div>
  </div>
  <!-- action button sections -->
  <div class="menusection">
  	<button class="btn btn-default" data-toggle="modal" data-target="#model_addprocessor">add processor</button>
  </div>
</div>

<div id="main" class="mainwide">
  <h2>Sidenav Push Example</h2>
  <p>Click on the element below to open the side navigation menu, and push this content to the right.</p>
</div>

<!-- Modal -->
<div id="model_addprocessor" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a Processor</h4>
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

<!-- animation script -->
<script src={{ url ("/js/monitoring.js")}} ></script>
@endsection