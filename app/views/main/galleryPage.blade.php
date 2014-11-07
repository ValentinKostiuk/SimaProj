@extends('layouts.mainLayout')
@section('content')
@if(isset($model['galleryItems']))
<div id="galleryItems" class="gallery-items-wrapper">
	@foreach ($model['galleryItems'] as $item)
	<div class="gallery-item-wrapper">
		<img src="{{$item['imageUrl']}}" title="{{$item['title']}}" class="gallery-item-image"/>
		<span class="gallery-item-name">{{$item['name']}}</span>
		@if($item['price'] > 0)
		<span class="gallery-item-price">{{$item['price']}} грн.</span>
		@else
		<span class="gallery-item-price">Этот товар безценен:)</span>
		@endif
	</div>
	@endforeach
</div>
@endif
<script type="text/javascript">
	//	$(document).ready(function() {
	//		$("#carouselItems").owlCarousel({autoPlay: true, singleItem: true, pagination: false});
	//	});
</script>
@stop