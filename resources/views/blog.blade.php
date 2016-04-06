@extends('layouts.page')

@section('main')
	<div class="row-90 white-bg">
		<div class="col-3">
			@include('partials.side-bar')
		</div>
		<div class="col-9">
			@foreach($posts as $post)	
	            <div class="col-6 area">
	                @include('partials.article')
	            </div>
	        @endforeach
		</div>
	</div>
@stop