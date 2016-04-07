@extends('layouts.page')

@section('main')
    <script type="text/javascript" src="/js/load_products.js"></script>
    <div class="row-90 white-bg">
        <div class="col-3">
            
            @include('partials.side-bar')

        </div>
        <div class="col-9">
            <?php if(!isset($_GET['pattern']) && !isset($_GET['section']) && !isset($_GET['min']) && !isset($_GET['max'])) : ?>
                <div class="col-12 area-8">
                    <img src="/img/logo.png" width="500" alt="">
                </div>
                <div class="col-6 area-4">
                    <p class="big justify dark-grey-text">
                        Na této stránce najdete širokou škálu produktů z mnoha e-shopů, se kterými spolupracujeme.
                    </p>
                </div>
                <div class="col-6 area-4">
                    <p class="big justify dark-grey-text">
                        Využijte filtrů a vyberte si zboží přesně podle Vašeho gusta!
                    </p>
                </div>
            <?php else : ?>
                <div class="col-12 area">
                        <h3 class="cetner">Nalezené produkty</h3>
                </div>
                <div class="col-4 area grey-bg">
                    <form class="center">
                        Směr řazení:&nbsp;
                        <select name="order" id="order">
                            <option value="views-desc">Nejoblíbenější</option>
                            <option value="price-asc">Nejlevnější</option>
                            <option value="price-desc">Nejdražší</option>
                        </select>
                    </form>
                </div>
                <div class="col-4 area grey-bg">
                        <p class="center" style="padding: 6px">Nalezeno <span class="bold count"></span> produktů</p>
                </div>
                <div class="col-4 area grey-bg">
                        <p class="center" style="padding: 6px">&nbsp;</p>
                </div>
                <div class="col-12 grid" id="product_feed"></div>
            <?php endif; ?>
        </div>
    </div>
@stop