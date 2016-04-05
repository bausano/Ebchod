@extends('layouts.master')

@section('main')
    <div class="row white-bg">
        <div class="col-12">
            <div class="area">
                <h2 class="center dark-grey-text">Oblíbené produkty</h2>
            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="row-90 grid" style="height: 600px;">
            @foreach($favorites as $product)
                <div class="col-4 grid-item">
                    <div class="area">
                        @include('partials.product')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row white-bg">
        <div class="col-12">
            <div class="area">
                <h2 class="center dark-grey-text">Poslední články</h2>
            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="col-6">
            <div class="area">
                @include('partials.article')
            </div>
        </div>
        <div class="col-6">
            <div class="area">
                @include('partials.article')
            </div>
        </div>
    </div>
@stop