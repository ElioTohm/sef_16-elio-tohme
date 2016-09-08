@extends('layouts.app')

@section('content')

<link href={{ url ('/css/customStyle.css')}}  rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div class="panel-body">
                @if (count($posts))
					@foreach ($posts as $post)
						<form action="{{ url('delete/'.$post->id) }}" method="POST">
							{{ csrf_field() }}
                            {{ method_field('DELETE') }}
							<div class="row">
						        <div class="col-md-8 col-md-offset-2">
						            <div class="panel panel-primary">
										<div class="panel-heading">
										 	<a href="" ><strong>{{ $post->title }}</strong></a>
										</div>
						                <div class="panel-body body-fixed-height">
						                    <p> {{ $post->body }} </p>
						                </div>
						                <div class="panel-footer">
										 	<button type="submit" class="btn btn-danger btn-sm pull-right">
									           <i class="fa fa-btn fa-trash"></i>Delete
									        </button>
										 	<p class="text-muted">{{ $post->created_at }}</p>
						                </div>
									</div>
					            </div>
					        </div>
						</form>
					@endforeach
					@else
					<p>You have no Posts</p>
					@endif
			    </div>
            </div>
            
        </div>
    </div>
</div>

@endsection