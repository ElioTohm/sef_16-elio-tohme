@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div class="panel-body">
					@foreach ($posts as $post)
					    <div class="row">
					        <div class="col-md-8 col-md-offset-2">
					            <div class="panel panel-default">
									<div class="panel-heading">
									 	<a href=""> {{ $post->title }} </a>	
									 </div>
					                <div class="panel-body">
					                    <p> {{ $post->body }} </p>
					                </div>
									</div>
					            </div>
					        </div>
					@endforeach
			    </div>
            </div>
        </div>
    </div>
</div>

@endsection