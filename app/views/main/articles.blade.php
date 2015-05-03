@extends('layouts.mainLayout')
@section('headerTags')
	<link rel="stylesheet" href="/statics/styles/articles.css">
	<script type="text/javascript" src="/statics/scripts/articlesInit.js"></script>
@stop

@section('content')
	<div class="articles-all-articles-wrapper">
		@if(isset($articles))
				@foreach ($articles as $article)
					<div class="articles-all-article collapsed">
						<h3 class="articles-all-article-heading">
							{{$article['heading']}}
						</h3>
						<div class="articles-all-article-content">
							{{$article['content']}}
						</div>
						<div class="articles-all-article-ruler"></div>
					</div>
				@endforeach
		@endif
	</div>
@stop