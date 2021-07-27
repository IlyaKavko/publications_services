<?php


namespace Server\DataBase;
require_once __DIR__ . '/../interface/db/Configs/iConfigs.php';
require_once __DIR__ . '/Modeles/DbConnect.php';
require_once __DIR__ . '/Modeles/DbNames.php';

class Configs implements iConfigs
{
    private static bool $ilsLoaded = false;
    private static iDbConnect $dbConnect;
    private static iDbNames $dbNames;


    static function getDbConnect(): iDbConnect
    {
        self::checkLoad();
        return self::$dbConnect;
    }

    static function getDbNames(): iDbNames
    {
        self::checkLoad();
        return self::$dbNames;
    }

    static function checkLoad(): void
    {
        self::$ilsLoaded || self::load();
    }

    static function load(): void
    {
        self::$ilsLoaded = true;
        $model = self::loadConfigModel();
		self::setConfigs($model);
    }

    static function setConfigs(array $model): void
    {
        self::$dbConnect = new DbConnect($model['DB_CONNECT']);
        self::$dbNames = new DbNames($model['DB_NAMES']);
    }

    static function loadConfigModel(): array
    {
        $file = 'server/db/Configs/ConfigModel/SqlConfig.ini';
        return parse_ini_file($file, true);
    }
}