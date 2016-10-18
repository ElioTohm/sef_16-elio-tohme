<div class="list-group">
	@if (count($allusersprocessors))
		@foreach ($allusersprocessors as $processor)
			@foreach ($processor->sensors as $sensor)
				<a class="list-group-item active" sensorid="{{ $sensor->sensor_id }}"
				sensors_processor="{{$processor->id}}">
					{{ $sensor->sensor_type }}
				</a>
			@endforeach
		@endforeach
	@endif
</div>

