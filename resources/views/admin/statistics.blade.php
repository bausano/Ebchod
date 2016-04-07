<?php

?>
@extends('layouts.admin')

@section('main')
	<div class="grid col-9">
        <div class="col-12 area-8">
            <img src="/img/logo.png" width="500" alt="">
        </div>
        <div class="col-8 area-4">
        	<h3>TOP produkty:</h3>
            <ul class="ul-3 area">
            	@foreach ($top_products as $product)
					<li class="col-4 area-4">
						<img src="{{ $product['img'] }}" class="thumbnail">
						<span class=""> {{ $product['display_name'] }} </span>
						<span class=""> {{ $product['views'] }} </span>
					</li>
            	@endforeach
            </ul>
        </div>
        <div class="col-4 area-4">
            <p class="big justify dark-grey-text">
                Využijte filterů a vyberte si zboží přesně podle Vašeho gusta!
            </p>
        </div>
	</div>
@stop