<?php


namespace Server\Author;
use \Server\Factory;
require_once __DIR__ . '/../interface/author/iAuthorStruct.php';
require_once __DIR__ . '/../../Factory.php';

class AuthorStruct implements iAuthorStruct
{
	private int $author_id;
	private string $name_author;
	private string $path_to_image;

	public function __construct(array $model)
	{
		$this->author_id = (int)$model['id'];
		$this->name_author = (string)$model['name'];
		$this->path_to_image = (string)$model['path_to_avatar'];
	}

	function getIdAuthor(): int
	{
		return $this->author_id;
	}

	function getNameAuthor(): string
	{
		return $this->name_author;
	}

	function getPathToAvatar(): string
	{
		return $this->path_to_image;
	}

	function update( array $model ): bool
	{
		$this->name_author = trim($model['name']);
		$this->path_to_image = trim($model['image']);

		return $this->save();
	}

	function delete(): bool
	{
		return Factory::Authors()->deleteAuthor($this->getIdAuthor());
	}

	function toArray(): array
	{
		// TODO: Implement toArray() method.
	}

	private function save(): bool
	{
		return Factory::Authors()->updateAuthor($this);
	}


}