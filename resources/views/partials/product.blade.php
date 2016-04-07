<a href="/products/detail/{{ $product->item_id }}" target="product">
	<div class="product">
	    <div>
	    	<img src="{{ $product->images->first()->url }}" alt="">
		   	<div class="area-4 product-desc">
		        <h5 class="uppercase">{{ $product->display_name }}</h5>
		        <p class="left bold big">{{ $product->price }} Kč</p>
		        <p class="justify">{{ str_limit($product->description, 200) }}</p>
		   	</div>
	    </div>
	</div>
</a>