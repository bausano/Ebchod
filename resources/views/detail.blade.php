@extends('layouts.page')

@section('main')
    <div class="row white-bg" style="height: 700Px"> <!-- odstranit -->
        <div class="col-9">
    			<img src="{{ $product->images->first()->url }}" alt="">
        </div>
        <div class="col-3">
            dsfgsdg
        </div>
    </div>
@stop