<div class="product">
    <div class="area-4">
        <h5 class="uppercase">{{ $product->display_name }}</h5>
    	<img src="{{ $product->images->first()->url }}" alt="">
        <p class="left bold big">{{ $product->price }} Kč</p>
        <p class="justify">{{ $product->description }}</p>
    </div>
</div>

