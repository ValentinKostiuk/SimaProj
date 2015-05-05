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
								<a href="{{$item['linkTo']}}"><img src="{{$item['imageUrl']}}"
								                                   title="{{$item['imageTitle']}}"
								                                   class="owl-carousel-image"/></a>
							</div>
						@endforeach
					</div>
				</span>
			</div>
			<div class="landing-page-top-block-shadow"></div>
		</div>
	@endif

	<div class="landing-page-horizontal-ruler"></div>

	<div class="landing-page-product-groups-wrapper">
		<div class="landing-page-product-group women">
			<a href="/gallery/women" class="landing-page-product-group-banner">
				<h3 class="landing-page-product-group-heading">Женщинам</h3>
				<img src="/statics/images/main/product-group-women.jpg" class="landing-page-product-group-image">
			</a>
		</div>
		<div class="landing-page-product-group men">
			<a href="/gallery/men" class="landing-page-product-group-banner">
				<h3 class="landing-page-product-group-heading">Мужчинам</h3>
				<img src="/statics/images/main/product-group-men.jpg" class="landing-page-product-group-image">
			</a>
		</div>
		<div class="landing-page-product-group kids">
			<a href="/gallery/kids" class="landing-page-product-group-banner">
				<h3 class="landing-page-product-group-heading">Детям</h3>
				<img src="/statics/images/main/product-group-kids.jpg" class="landing-page-product-group-image">
			</a>
		</div>
	</div>

	<div class="landing-page-horizontal-ruler"></div>

	<div class="landing-page-articles-wrapper">
		@if(isset($model['articles']))
			@foreach ($model['articles'] as $article)
				<div class="landing-page-article">
					<h2 class="landing-page-article-heading">{{$article['heading']}}</h2>

					<div class="landing-page-article-text">{{$article['content']}}</div>
					<a href="/articles/{{$article['id']}}" class="landing-page-article-read-more-link">Дальше</a>
				</div>
			@endforeach
		@endif
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#carouselItems").owlCarousel({
				autoPlay: true,
				singleItem: true,
				pagination: true,
				navigation: true,
				navigationText: ["<i class='icon-left-open'></i>", "<i class='icon-right-open'></i>"]
			});
		});
	</script>
@stop