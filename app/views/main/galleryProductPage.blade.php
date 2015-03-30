@extends('layouts.mainLayout')
@section('headerTags')
	<link rel="stylesheet" href="/statics/styles/gallery.css">
	<script type="text/javascript" src="/statics/scripts/galleryMenuInit.js"></script>
@stop
@section('content')
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
	@if(isset($product))
		<div class="gallery-product-wrapper">

			<div class="gallery-product-main">
				<img src="{{$product['imageUrl']}}" title="{{$product['title']}}" class="gallery-product-image"/>

				<div class="gallery-product-details">
					<h2 class="gallery-product-heading">{{$product['name']}}</h2>

					<span class="gallery-product-short-description">{{$product['shortDescription']}}</span><br/>

					<span class="gallery-product-short-description-label">Номер продукта:</span>

					<span class="gallery-product-short-description-field">{{$product['id']}}</span><br/>

					<span class="gallery-product-short-description-label">Цена:</span>
					@if($product['price'] > 0)
						<span class="gallery-product-short-description-field">₴ {{$product['price']}}</span>
					@else
						<span class="gallery-product-short-description-field">Этот товар безценен:)</span>
					@endif
				</div>
			</div>

			<div class="gallery-product-long-description">
				{{$product['description']}}
			</div>
		</div>
	@endif
@stop