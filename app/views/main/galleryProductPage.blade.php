@extends('layouts.mainLayout')
@section('content')
	@if(isset($product))

		<h1 class="gallery-product-heading">{{$product['name']}}</h1>

		<table id="galleryItems" class="gallery-product-table">
			<tr>
				<td class="gallery-product-image-col">
					<img src="{{$product['imageUrl']}}" title="{{$product['title']}}" class="gallery-product-image"/>
				</td>
				<td class="gallery-product-short-description-col">
					<span class="gallery-product-short-description-col-liable">Номер продукта:</span>
					<span class="gallery-product-short-description-col-field">{{$product['id']}}</span><br/>

					<span class="gallery-product-short-description-col-liable">Цена:</span>
					@if($product['price'] > 0)
						<span class="gallery-product-short-description-col-field">{{$product['price']}} грн.</span>
					@else
						<span class="gallery-product-short-description-col-field">Этот товар безценен:)</span>
					@endif
					<br/>
					<span class="gallery-product-short-description">{{$product['shortDescription']}}</span>
				</td>
			</tr>
		</table>

		<div class="gallery-product-long-description">
			{{$product['description']}}
		</div>
	@endif
@stop