@extends('layouts.index')

@section('title')

{{ $post -> title }}

@endsection

@section('content')
    <div class="page-header">
        <div class='btn-toolbar'>
            <a class="btn btn-primary btn-lg" href="{{ url()->previous() }}">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
            <div class="panel-heading">
				<h1>{{ $post->title }}</h1>
				<small> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $post->user->email }} |
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span> </small> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at ))->diffForHumans() }}
			</div>
			<div class="panel-body">
			{!! $post->content !!}
			</div>	
        </div>
    </div>
	@if(Sentinel::check())
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1" >
			<h2>Leave a comment</h2>
				<form accept-charset="UTF-8" role="form" method="post" action="{{ route('post.store') }}">
				<div class="form-group {{ ($errors->has('content')) ? 'has-error' : '' }}">
                         <textarea class="form-control" name="content" id="post-content" style="height:300px;">  </textarea>
                        {!! ($errors->has('content') ? $errors->first('content', '<p class="text-danger">:message</p>') : '') !!}
                </div>
				{{ csrf_field() }}
				<input type="hidden" name="post_id" value="{{ $post->id}}">
					<input class="btn btn-lg btn-primary" type="submit" value="Comment">
				</form>
			</div>	
		</div>
	@else
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
				<div class="well">
					Please <a href="{{ route ('auth.login.form') }}">Sign In</a> or <a href="{{ route ('auth.register.form') }}">Sign up</a> to leave a comment.
				</div>
			</div>	
		</div>
	@endif
@stop
