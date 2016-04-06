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
    <div class="row-90 white-bg">
        <div class="col-3">
            <div class="area theme-bg">
                <h4 class="center white-text">Kategorie</h4>
            </div>
            <ul class="sections-page">
                <?= Helper::sectionTree($sections->get()) ?>
            </ul>
            <div class="area theme-bg">
                <h4 class="center white-text">Doporučené</h4>
            </div>
        </div>
        <div class="col-9 grid" id="product_feed">
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