@extends('layouts.page')

@section('main')
    <!--
    <div class="row theme-bg">
        <div class="col-12">
            <div class="area">
                <h2 class="center dark-grey-text">Produkty</h2>
            </div>
        </div>
    </div>
    -->
    <div class="row">
        <div class="col-3 white-bg">
        dsfgsdg
        </div>
        <div class="col-9 grid">
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