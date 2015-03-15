@extends('layouts.mainLayout')
@section('headerTags')
	<link rel="stylesheet" href="/statics/styles/gallery.css">
	<script type="text/javascript" src="/statics/scripts/galleryMenuInit.js"></script>
@stop
@section('content')
	<div class="gallery-content-wrapper">
		<div class="gallery-left-menu-wrapper">
			<ul class="gallery-left-menu">
				<li class="gallery-left-menu-item">
					<a href="/gallery">Все товары</a>
				</li>
				<li class="gallery-left-menu-item">
					<a href="/gallery/women">Женщинам</a>
				</li>
				<li class="gallery-left-menu-item">
					<a href="/gallery/men">Мужчинам</a>
				</li>
				<li class="gallery-left-menu-item">
					<a href="/gallery/kids">Детям</a>
				</li>
				<li class="gallery-left-menu-item">
					<a href="/gallery/decor">Декор</a>
				</li>
			</ul>
		</div>
		@if(isset($model['galleryItems']))
			<div id="galleryItems" class="gallery-items-wrapper">
				@foreach ($model['galleryItems'] as $item)
					<div class="gallery-item-wrapper">
						<a href="{{{action('GalleryController@showProduct').'/'.$item['id']}}}">
							<img src="{{$item['imageUrl']}}" title="{{$item['title']}}" class="gallery-item-image"/>
							<span class="gallery-item-name">{{$item['name']}}</span>
						</a>
						@if($item['price'] > 0)
							<span class="gallery-item-price">{{$item['price']}} грн.</span>
						@else
							<span class="gallery-item-price">Этот товар безценен:)</span>
						@endif
					</div>
				@endforeach
			</div>
		@endif
	</div>
	<script type="text/javascript">
		//	$(document).ready(function() {
		//		$("#carouselItems").owlCarousel({autoPlay: true, singleItem: true, pagination: false});
		//	});
	</script>
@stop