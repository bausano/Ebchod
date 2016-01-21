
<div id="search">
    <form>
        <input class="toggle-autocomplete" placeholder="Vyhledávání" type="text" />
        {!! csrf_field() !!}
        <button onClick="return false;" class="toggle-filter"><i class="fa fa-gear"></i></button>
        <button class="orange"><i class="fa fa-search"></i></button>
    </form>

    <ul class="autocomplete">   
    </ul>
        <div class="filter">
            <div class="area">
                <p class="big bold dark-grey-text">Cena</p>
                <div data-min="{{ $priceRange[0] or 0 }}" data-max="{{ $priceRange[1] or 1 }}" class="price-range">
                    <div class="min">
                        <p class="small italic"></p>
                    </div>
                    <div class="max">
                        <p class="small italic"></p>
                    </div>
                </div>
            </div>
            <hr />
            <div class="area">
                <p class="big bold dark-grey-text">Kategorie</p>
                <div class="section-container" data-value="">
                    <p class="bold"><span class="value">Vyberte kategorii</span><span style="float: right"><i class="fa fa-times delete"></i></span></p>
                    <ul class="sections">
                        <?= Helper::sectionTree($sections->get()) ?>
                    </ul>            
                </div>
            </div>
        </div>  
    <p class="small italic dark-grey-text">Oblíbené: Kočárky</p>
</div>