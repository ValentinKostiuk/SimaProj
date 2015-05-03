@extends('layouts.mainLayout')
@section('headerTags')
	<link rel="stylesheet" href="/statics/styles/articles.css">
@stop
@section('content')
	@if(isset($article))
		<div class="articles-article-wrapper">
			<div class="articles-article-heading">
				<h2>{{$article['heading']}}</h2>

				<div class="articles-article-content">
					{{$article['content']}}
				</div>
			</div>
		</div>
	@endif
@stop