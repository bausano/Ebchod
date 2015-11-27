@extends('layouts.master')

@section('main')
    <div class="row theme-bg">
        <div class="col-12">
            <div class="area">
                <h2 class="center dark-grey-text">Oblíbené produkty</h2>
            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="row-90 grid" style="height: 600px;">
            @for( $x = 0 ; $x < rand(10,13) ; $x++ )
                <div class="col-3 grid-item">
                    <div class="area">
                        @include('partials.product')
                    </div>
                </div>
                @endfor
        </div>
    </div>
    <div class="row theme-bg">
        <div class="col-12">
            <div class="area">
                <h2 class="center dark-grey-text">Poslední články</h2>
            </div>
        </div>
    </div>
    <div class="row dark-grey-bg">
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