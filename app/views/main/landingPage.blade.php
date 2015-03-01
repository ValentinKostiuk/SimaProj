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
		<div class="landing-page-article">
			<h2 class="landing-page-article-heading">Стирка</h2>
			<p class="landing-page-article-text">
				Вязаные изделия  стирают вручную. Температура воды 30-40 градусов. При более высоких температурах вязаные изделия из шерсти могут дать сильную усадку. Стирают с добавлением мягкого моющего средства (без БИОактивных и отбеливающих веществ). Желательно использовать специальные моющие средства, предназначенные для стирки шерстяных изделий. Порошок предварительно растворить в воде и только потом опускать туда вязаное изделие. Нельзя сыпать порошок непосредственно на стираемую вещь - порошок может испортить цвет изделия.
				При стирке вязаное изделие нельзя подвергать сильным механическим воздействиям: тереть, тянуть, выкручивать - изделие может растянуться и потерять свою форму.
				При стирке изделия  слегка сжимают. При полоскании изделия перекладывают из одной воды в другую в скомканном виде. Прополаскивать необходимо тщательно - остатки порошка при сушке могут испортить цвет вязаного изделия.
				Отжимают вязаные  вещи через полотенце.
				Вязаные изделия из пряжи с маркировкой "suрerwash" можно подвергать машинной стирке по специальной программе при температуре воды 30 градусов.
			</p>
			<a href="/articles/1" class="landing-page-article-read-more-link">Дальше</a>
		</div>
		<div class="landing-page-article">
			<h2 class="landing-page-article-heading">Сушка</h2>
			<p class="landing-page-article-text">
				Сушат вязаные  вещи в разложенном виде на ровной горизонтальной поверхности.
				Нельзя сушить вязаные вещи в подвешенном виде (на веревке или плечиках).
			</p>
			<a href="/articles/2" class="landing-page-article-read-more-link">Дальше</a>
		</div>
		<div class="landing-page-article">
			<h2 class="landing-page-article-heading">Хранение</h2>
			<p class="landing-page-article-text">
				Утюжить изделия рекомендуется через влажную хлопчатобумажную ткань умеренно нагретым утюгом (до 130 градусов). Утюжить можно изделия с гладким рисунком. При утюжке рельефные узоры становятся плоскими.
				Вязаные вещи хранят в сложенном виде на полке в шкафу. Не рекомендуется вешать вязаные изделия на плечики!  Убирая вещи на длительный срок, предварительно необходимо выстирать, хорошо высушить и использовать специальные средства против моли.
			</p>
			<a href="/articles/3" class="landing-page-article-read-more-link">Дальше</a>
		</div>
	</div>
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