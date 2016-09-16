@extends('layouts.app')

@section('posts')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">News Feed</div>
                <div class="panel-body">
                    @foreach ($posts as $post)
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading inner-header-height">
                                        <strong>{{ $post->user->name }}</strong>     
                                        
                                        <!-- <p class="text-muted"></p> -->
                                        <div class="pull-right ">
                                            >>
                                        </div>
                                    </div>
                                    <div class="panel-body body-fixed-height">
                                        <img src="{{ url( $path.$post->image_url) }}" class="img-rounded" >
                                    </div>
                                    <div class="panel-footer ">
                                        
                                        <!-- previous comments -->
                                        @foreach ($post->comments as $comment )
                                            <div>
                                                <strong><i>
                                                    {{ $comment->user->name }}
                                                </i></strong>
                                                : {{ $comment->comment_text }}
                                            </div>
                                                
                                        @endforeach
                                        
                                        <!-- Add comment -->
                                        <form>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_token" value="{{ csrf_token() 
                                            }}">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="form-group">
                                                <input placeholder="comments" type="text" name="text" id="text" class="form-control" />
                                            </div>
                                            @if ($errors->has('text'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('text') }}</strong>
                                                </span>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container">
                    {{ $posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src={{ url ("/js/Comment.js")}} ></script>
@endsection