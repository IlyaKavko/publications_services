<?php


namespace Server\DataBase;


class DataBase
{
    static private string $charset = 'utf8';
    static private \PDO $pdo;

    protected function __construct() {
        self::init();
    }

    static private function init(): void {
        if (!isset(self::$pdo))
            self::initDBConnection();
    }

    static protected function initDBConnection() : void {
        $config = Configs::getDbConnect();
        $dsn = 'mysql:host=' . $config->getHost() . ';dbname=' . $config->getDbName() . ';charset=' . self::$charset;
        self::$pdo = new \PDO($dsn, $config->getUser(), $config->getPassword(), self::getOptions());
    }

    static private function getOptions(): array {
        return [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::ATTR_EMULATE_PREPARES => false,];
    }

    static protected function query(string $request){
        self::init();
        $stmt = self::$pdo->query($request);
        return $stmt ? $stmt->fetchAll() : false;
    }

    static protected function querySql(string $request) : array {
        $result = self::query($request);
        if($request === false)
            throw new \Exception('Unknown Error');
        return $result;
    }

    static protected function execute(string $request, array $params = []) {
        self::init();
        $stmt = self::$pdo->prepare($request);
        return $stmt->execute($params);
    }

    static protected function executeSql(string $request, array $params = []) : void {
        if(self::execute($request, $params) === false)
            throw new \Exception('Unknown Error');
    }

    static protected function last_id() {
        return self::querySql('SELECT @@IDENTITY AS id')[0]['id'] ?? null;
    }

}