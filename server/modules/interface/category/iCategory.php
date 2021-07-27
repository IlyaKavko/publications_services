<?php


namespace Server\Category;


interface iCategory
{
	function setCategory(string $name, string $path): bool;
	function getAllCategory(string $path): array;
	function updateCategory(int $id, $title): bool;
	function deleteCategory(int $id): bool;
}