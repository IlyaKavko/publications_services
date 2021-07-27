<?php
namespace Server\Author;

interface iAuthorStruct
{
	function getIdAuthor(): int;
	function getNameAuthor(): string;
	function getPathToAvatar(): string;
	function update(array $model): bool;
	function delete():bool;
	function toArray(): array;
}