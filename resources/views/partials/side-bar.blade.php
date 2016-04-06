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