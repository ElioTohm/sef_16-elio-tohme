<div class="list-group" id="processorslist">
	@if (count($processors))
		@foreach ($processors as $processor)
			<a class="list-group-item active" processorid="{{ $processor->id }}"> 
				{{ $processor->processor_name}}
			</a>
		@endforeach
	@endif
	<div id="pagination_navbar">
		{{ $processors->links() }}
	</div>
</div>
