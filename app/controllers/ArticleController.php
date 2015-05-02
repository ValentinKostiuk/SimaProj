<?php

class ArticleController extends BaseController
{
	public function show($articleId = null)
	{
		if (!$articleId) {
			return Redirect::action('ArticleController@showAll');
		}

		$article = ArticleItem::find($articleId);

		if ($article === null) {
			App::abort(404);
		}

		return View::Make('main.article', array(
			'article' => $article
		));
	}

	public function showAll()
	{
		return View::Make('main.articles');
	}
} 