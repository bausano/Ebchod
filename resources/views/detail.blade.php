@extends('layouts.page')

@section('main')
    <div class="row-90 white-bg">
        <div class="col-6">
        	<div class="area-8">
    			<img class="bordered" src="{{ $product->images->first()->url }}" alt="">
        	</div>
        </div>
        <div class="col-6">
        	<div class="area-8">
         		<h4 class="uppercase">{{ $product->display_name }}</h4>
        		<p class="left bold big margin">{{ $product->price }} Kč</p>
         		<p class="justify margin">
         			{{ $product->description }}
         		</p>
         		<p class="center"><a target="_blank" href="{{ $product->url }}" class="go">Přejít k obchodu</a></p>
        	</div>
        </div>
    </div>
    <div class="row-90 grey-bg">
    	<div class="col-3">
        	<div class="area-4 gallery">
    			<img src="{{ $product->images->first()->url }}" alt="">
        	</div>
        </div>
    	<div class="col-3">
        	<div class="area-4 gallery">
    			<img src="{{ $product->images->first()->url }}" alt="">
        	</div>
        </div>
    	<div class="col-3">
        	<div class="area-4 gallery">
    			<img src="{{ $product->images->first()->url }}" alt="">
        	</div>
        </div>
    	<div class="col-3">
        	<div class="area-4 gallery">
    			<img src="{{ $product->images->first()->url }}" alt="">
        	</div>
        </div>
    </div>
@stop