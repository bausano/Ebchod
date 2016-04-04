@extends('layouts.page')

@section('main')
    <div class="row-90 white-bg">
        <div class="col-3">
            <div class="area theme-bg">
                <h4 class="center white-text">Kategorie</h4>
            </div>
            <ul class="sections-page">
                <?= Helper::sectionsPage($sections->get()) ?>
            </ul>
            <div class="area theme-bg">
                <h4 class="center white-text">Doporučené</h4>
            </div>
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