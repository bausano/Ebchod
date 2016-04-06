@extends('layouts.page')

@section('main')
    <div class="row-90 white-bg">
        <div class="col-3">
            
            @include('partials.side-bar')

        </div>
        <div class="col-9 grid" id="product_feed">
            <?php if(!isset($_GET['pattern'])) : ?>
                <div class="col-12 area-8">
                    <img src="/img/logo.png" width="500" alt="">
                </div>
                <div class="col-6 area-4">
                    <p class="big justify dark-grey-text">
                        Na této stránce najdete nejširší škálu produktů z mnoha e-shopů, se kterými spolupracujeme.
                    </p>
                </div>
                <div class="col-6 area-4">
                    <p class="big justify dark-grey-text">
                        Využijte filterů a vyberte si zboží přesně podle Vašeho gusta!
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
@stop