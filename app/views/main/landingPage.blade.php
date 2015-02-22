@extends('layouts.mainLayout')
@section('headerTags')
	<link rel="stylesheet" href="/statics/styles/landingPage.css">
@stop

@section('content')

	@if(isset($model['carouselItems']))
		<div class="landing-page-top-block-wrapper">
			<div class="landing-page-top-block">
				<span class="landing-page-top-block-left-logo-wrapper">
					<img class="header-logo-image" src="/statics/images/main/madeWithLove.png">
				</span>
				<span class="landing-page-top-block-carousel-wrapper">
					<div id="carouselItems" class="owl-carousel">
						@foreach ($model['carouselItems'] as $item)
							<div class="owl-carousel-image-wrapper">
								<a href="{{$item['linkTo']}}"><img src="{{$item['imageUrl']}}" title="{{$item['imageTitle']}}" class="owl-carousel-image"/></a>
							</div>
						@endforeach
					</div>
				</span>
			</div>
			<div class="landing-page-top-block-shadow"></div>
		</div>
		<div class="landing-page-horizontal-ruler"></div>
	@endif
	<script type="text/javascript">
		$(document).ready(function () {
			$("#carouselItems").owlCarousel({
				autoPlay: true,
				singleItem: true,
				pagination: true,
				navigation: true,
				navigationText: ["<", ">"]
			});
		});
	</script>
@stop