@extends('layouts.mainLayout')
@section('content')

@if(isset($model['carouselItems']))
<div id="carouselItems" class="owl-carousel">
	@foreach ($model['carouselItems'] as $item)
		<div class="owl-carousel-image-wrapper">
			<a href="{{$item['linkTo']}}"><img src="{{$item['imageUrl']}}" title="{{$item['imageTitle']}}" class="owl-carousel-image"/></a>
		</div>
	@endforeach
</div>
@endif
<script type="text/javascript">
	$(document).ready(function() {
		$("#carouselItems").owlCarousel({autoPlay: true, singleItem: true, pagination: false});
	});
</script>
@stop