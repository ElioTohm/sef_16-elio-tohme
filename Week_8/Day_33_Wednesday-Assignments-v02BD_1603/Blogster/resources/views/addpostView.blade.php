@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Adding Post</div>
			<div class="panel-body">
				<form action="{{url('addpost')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input required="required" placeholder="Enter title here" type="text" name = "title"class="form-control" />
					</div>
					<div class="form-group">
						<textarea required="required" name='body' class="form-control" placeholder="insert description and details here"></textarea>
					</div>
					<input type="submit" name='publish' class="btn btn-success" value="Publish"/>
				</form>
			</div>
		</div>	
	</div>
	
</div>

@endsection