<?php


namespace Server\DataBase;


interface iConfigs
{
    static function getDbConnect(): iDbConnect;
    static function getDbNames(): iDbNames;
}