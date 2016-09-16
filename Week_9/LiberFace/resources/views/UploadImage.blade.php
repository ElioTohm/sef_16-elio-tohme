@extends('layouts.app')

@section('uploadiamge')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Image</div>

                <div class="panel-body">
					<form action="{{url('UploadImage')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<input type="text" name="tags" id="tags" class="form-control" >
						</div>
						<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
					    	 <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" required >
                                </input>
						</div>
						@if ($errors->has('file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file') }}</strong>
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