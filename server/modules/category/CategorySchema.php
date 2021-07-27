<?php


namespace Server\Category;
require_once __DIR__ . '/../../db/DataBase.php';

use Server\DataBase\DataBase;


class CategorySchema extends DataBase
{
	private string $get_name_category_db;

	public function __construct()
	{
		parent::__construct();
		$this->get_name_category_db = self::getCategorySchema();
	}

	/**
	 * @throws \Exception
	 */
	function createCategory( string $name, string $path): bool
	{
		self::validateCategoryName($name);
		$sql = "INSERT INTO $this->get_name_category_db (name, path)
				VALUE (:name, :path)";

		if (!self::execute($sql, ['name' => $name, 'path' => $path]))
		{
			throw new \Exception('Failed to create new Author');
		}

		return true;
	}

	function getCategory(string $path): array
	{
		$sql = "SELECT * FROM $this->get_name_category_db WHERE path LIKE "."'".$path."%' ORDER BY path";
		return self::querySql($sql);
	}

	/**
	 * @throws \Exception
	 */
	function update( int $id, string $name): bool
	{
		$sql = "UPDATE $this->get_name_category_db SET name = :name WHERE category_id = $id";
		if (!self::execute($sql, ['name' => $name]))
		{
			throw new \Exception('Failed to create new Author');
		}

		return true;
	}

	function delete(int $id): bool
	{
		$sql = "DELETE FROM $this->get_name_category_db WHERE $this->get_name_category_db.`category_id` = $id";
		return self::execute($sql);
	}

	protected function validateCategoryName(string $name): void
	{
		$sql = "SELECT `name` FROM $this->get_name_category_db WHERE `name` = "."'".$name ."'";
		if (self::querySql($sql)[0]['name'] === $name)
		{
			throw new \Exception('Such an author already exists');
		}
	}

}