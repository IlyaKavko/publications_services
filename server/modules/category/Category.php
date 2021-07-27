<?php


namespace Server\Category;
require_once __DIR__ . '/CategorySchema.php';
require_once __DIR__ . '/../interface/category/iCategory.php';

class Category extends CategorySchema implements iCategory
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @throws \Exception
	 */
	function setCategory( string $name, string $path ): bool
	{
		return $this->createCategory($name, $path);
	}


	function getAllCategory(string $path): array
	{
		$test = $this->getCategory($path);
		$new_array = [];
		foreach ($test as $t)
		{
			$d = explode('.', $t['path']);
			$c = count($d);
		}

	}

	/**
	 * @throws \Exception
	 */
	function updateCategory( int $id, $title ): bool
	{
		return $this->update($id, $title);
	}

	function deleteCategory( int $id ): bool
	{
		return $this->delete($id);
	}
}