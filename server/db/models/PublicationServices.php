<?php


namespace Server\DataBase;
require_once __DIR__ . '/../Configs/Configs.php';

trait PublicationServices
{
	static function getAuthorSchema(): string
	{
		return '`' . self::getPublicationServicesDb() . '`.`author`';
	}

	static function getCategorySchema(): string
	{
		return '`' . self::getPublicationServicesDb() . '`.`category`';
	}

    static function getPublicationServicesDb(): string
    {
        return Configs::getDbNames()->getPublicationDb();
    }
}