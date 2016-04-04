<a href="/products/detail/{{ $product->item_id }}">
	<div class="product">
	    <div>
	    	<img src="{{ $product->images->first()->url }}" alt="">
		   	<div class="area-4 product-desc">
		        <h5 class="uppercase">{{ $product->display_name }}</h5>
		        <p class="left bold big">{{ $product->price }} Kč</p>
		        <p class="justify">{{ $product->description }}</p>
		   	</div>
	    </div>
	</div>
</a>