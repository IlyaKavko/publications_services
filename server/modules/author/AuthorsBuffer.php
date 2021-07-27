<?php


namespace Server\Author;



trait AuthorsBuffer
{
	private array $authors = [];

	private function deleteFromBuffer(int $author_id): void
	{
		unset($this->authors[$author_id]);
	}

	private function findInBuffer(int $author_id): iAuthorStruct|null
	{
		return $this->authors[$author_id] ?? null;
	}

	private function addBuffer(iAuthorStruct $authors): void
	{
		$this->authors[$authors->getIdAuthor()] = $authors;
	}
}