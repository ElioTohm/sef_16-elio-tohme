@section('navbar')
<!-- Style sheet -->

<div id="sidebar">
<div id="navbar" class="sidenav">
  <a class="menubtn" id="menubtn" ><span class="glyphicon glyphicon-menu-hamburger"></span></a>
  <!-- List of processors -->
	<div class="form-inline menusection">
		<div>
			<h6><b><u><a data-toggle="modal" data-target="#model_addprocessor">Processors</a></u></b></h6>
		</div>
		<div class="list-group">
			@if (count($processors))
				@foreach ($processors as $processor)
					<a class="list-group-item active"> 
						{{ $processor->processor_name}}
					</a>
				@endforeach
			@endif
		</div>
	</div>	
  <!-- list of sensors -->
	<div class="form-inline menusection">
		<div>
			<h6><b><u><a data-toggle="modal" data-target="#model_addcensors">Censors</a></u></b></h6>
		</div>
		<div>

		</div>
	</div>
</div>
</div>

<script src={{ url ("/js/monitoring.js")}} ></script>

@endsection