<?php


namespace Server\DataBase;


trait PublicationServices
{
    static function getPublicationServicesDb(): string
    {
        return Configs::getDbNames()->getPublicationDb();
    }
}