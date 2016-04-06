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
            <div class="row grid">
                @foreach($favorites as $product)
                    <div class="col-6 grid-item">
                        <div class="area">
                            @include('partials.product')
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-9 grid">
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
                        Využijte našich pokrokových filterů a vyberte si zboží přesně podle Vašeho gusta!
                    </p>
                </div>
            <?php endif; ?>
            {{--
            @foreach($products->get() as $product)
                <div class="col-4 hover grid-item">
                    <div class="area">
                        @include('partials.product')
                    </div>
                </div>
            @endforeach
            --}}
        </div>
    </div>
@stop