<?php


namespace Server\Author;


interface iAuthors
{
	function setAuthor(string $name, string $image): bool;
	function getAuthors(int $author_id): iAuthorStruct;
	function updateAuthor( iAuthorStruct $model): bool;
	function deleteAuthor(int $author_id): bool;
}