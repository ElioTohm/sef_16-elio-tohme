@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div class="panel-body">
				    <div class="row">
				        <div class="col-md-8 col-md-offset-2">
				            <div class="panel panel-default">
								@foreach ($posts as $post)
									<div class="panel-heading"> {{ $post->title }}</div>
						                <div class="panel-body">
						                    {{ $post->body }}
						                </div>
									</div>
								@endforeach
				            </div>
				        </div>
				    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection