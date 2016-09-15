@extends('layouts.app')

@section('uploadiamge')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Image</div>

                <div class="panel-body">
					<form action="{{url('UploadImage')}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<input type="text" name="tags" id="tags" class="form-control" >
						</div>
						<div class="form-group">
					    	<input type="file" name="image" id="image">
						</div>
						@if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                        	@endif
						<input type="submit" name='publish' class="btn btn-success" value="Post"/>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection