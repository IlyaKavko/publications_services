<?php


namespace Server\DataBase;


class DbConnect implements iDbConnect
{
    private string $db_name;
    private string $user;
    private string $password;
    private string $host;

    public function __construct(array $model) {
        $this->db_name = $model['dbname'];
        $this->user = $model['user'];
        $this->password = $model['password'];
        $this->host = $model['host'];
    }

    function getDbName(): string {
        return $this->db_name;
    }

    function getUser(): string {
        return $this->user;
    }

    function getPassword(): string {
        return $this->password;
    }

    function getHost(): string {
        return $this->host;
    }

}