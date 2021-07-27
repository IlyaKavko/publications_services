<?php


namespace Server\DataBase;
require_once __DIR__ . '/../../interface/db/Configs/iDbNames.php';

class DbNames implements iDbNames
{
    private array $names;

    public function __construct(array $names) {
        $this->names = $names;
    }

    function getPublicationDb(): string
    {
        return $this->names['publication_services'];
    }

}