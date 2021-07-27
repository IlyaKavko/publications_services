<?php


namespace Server\Author;
require_once __DIR__ . '/../../db/DataBase.php';

class AuthorSchema extends \Server\DataBase\DataBase
{
	private string $get_name_author_table;

	public function __construct()
	{
		parent::__construct();
		$this->get_name_author_table = self::getAuthorSchema();
	}

	/**
	 * @throws \Exception
	 */
	function createAuthor(string $name, string $image): bool
	{
		self::validationsTitle($name);

		$sql = "INSERT INTO $this->get_name_author_table (name, path_to_avatar)
				VALUE (:name, :path_to_avatar)";
		if (!self::execute($sql, ['name' => $name, 'path_to_avatar' => $image]))
		{
			throw new \Exception('Failed to create new Author');
		}

		return true;
	}

	/**
	 * @throws \Exception
	 */
	function updateAuthors( int $id , string $name, string $image): bool
	{
		$sql = "UPDATE $this->get_name_author_table SET name = :name, path_to_avatar = :image WHERE id = $id";
		if (!self::execute($sql, ['name' => $name, 'image' => $image]))
		{
			throw new \Exception('Failed to update Author');
		};

		return true;
	}

	function getAuthor(int $id): array
	{
		$sql = "SELECT * FROM $this->get_name_author_table WHERE `id` = $id";
		return self::querySql($sql)[0];
	}

	function deleteAuthors(int $id): bool
	{
		$sql = "DELETE FROM $this->get_name_author_table WHERE $this->get_name_author_table.`id` = $id";
		self::query($sql);
		return true;
	}

	/**
	 * @throws \Exception
	 */
	private function validationsTitle( string $name): void
	{
		$sql = "SELECT `name` FROM $this->get_name_author_table WHERE `name` = "."'".$name ."'";
		if (self::querySql($sql)[0]['name'] === $name)
		{
			throw new \Exception('Such an author already exists');
		}
	}

}