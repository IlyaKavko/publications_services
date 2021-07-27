<?php


namespace Server;
require_once __DIR__ . '/modules/author/Authors.php';
require_once __DIR__ . '/modules/category/Category.php';

use Server\Author\Authors;
use Server\Author\iAuthors;
use Server\Category\Category;
use Server\Category\iCategory;

class Factory
{
	static function Authors(): iAuthors
	{
		return new Authors();
	}

	static function Category(): iCategory
	{
		return new Category();
	}
}