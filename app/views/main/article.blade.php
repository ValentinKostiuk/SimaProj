@extends('layouts.mainLayout')
@section('headerTags')
	<link rel="stylesheet" href="/statics/styles/gallery.css">
@stop
@section('content')
	@if(isset($article))
		<div class="gallery-product-wrapper">

			<div class="gallery-product-main">
				<h2>{{$article['heading']}}</h2>

				<div class="gallery-product-details">
					{{$article['content']}}
				</div>
			</div>
		</div>
	@endif
@stop