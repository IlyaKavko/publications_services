<?php


namespace Server\Author;
require_once __DIR__ . '/AuthorSchema.php';
require_once __DIR__ . '/../interface/author/iAuthors.php';
require_once __DIR__ . '/AuthorStruct.php';
require_once __DIR__ . '/AuthorsBuffer.php';

class Authors extends AuthorSchema implements iAuthors
{
	use AuthorsBuffer;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @throws \Exception
	 */
	function setAuthor( string $name , string $image): bool
	{
		return $this->createAuthor($name, $image);
	}

	function getAuthors( int $author_id ): iAuthorStruct
	{
		return $this->findInBuffer($author_id) ?? $this->_create($author_id);
	}

	/**
	 * @throws \Exception
	 */
	function updateAuthor( iAuthorStruct $model ): bool
	{
		return $this->updateAuthors($model->getIdAuthor(), $model->getNameAuthor(), $model->getPathToAvatar());
	}

	function deleteAuthor( int $author_id ): bool
	{
		$this->deleteFromBuffer($author_id);
		return $this->deleteAuthors($author_id);
	}

	protected function _create(int $id): iAuthorStruct
	{
		$model = $this->getAuthor($id);
		$author = new AuthorStruct($model);
		$this->addBuffer($author);
		return $author;
	}
}