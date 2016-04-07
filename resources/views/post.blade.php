@extends('layouts.page')

@section('main')
	<div class="row-90 white-bg">
		<div class="col-3">
			@include('partials.side-bar')
		</div>
		<div class="col-9">
			<div class="col-12 area-4">
				<h3>{{ $post->name }}</h3>
				<?= $post->content ?>
			</div>
			<div class="col-3 area-4 grey-bg gallery">
				<img src="/uploads/{{ $post->img }}" alt="" class="bordered">
			</div>
			<div class="col-12 area-4 white-bg">
				<h4>Relevantní produkty</h4>
			</div>
			<div class="col-12 grid">
				@forelse($relevant as $product)
					<div class="col-4 grid-item hover">
						<div class="area">
							@include('partials.product')
						</div>
					</div>
				@empty
					<div class="col-12 area-4 grid-item">
						<p class="center big dark-grey-text italic">Nenalezeny žádné vyhovující produkty</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
@stop