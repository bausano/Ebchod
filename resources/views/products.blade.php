@extends('layouts.page')

@section('main')
    <div class="row theme-bg">
        <div class="col-12">
            <div class="area">
                <h2 class="center dark-grey-text">Produkty</h2>
            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="row-90 grid" style="height: 600px;">
            @foreach($products->get() as $product)
                <div class="col-4 grid-item">
                    <div class="area">
                        @include('partials.product')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop