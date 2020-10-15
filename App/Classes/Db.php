<?php


abstract class Db 
{
    public static function connect()
    {
        $dsn = 'mysql:host='.HOST.';dbname='.DBNAME.';'.CHARSET;

        try
        {

        $connect = new PDO($dsn, USER, PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e)
        {
            //TO DO: make error class
            die($e->getMessage()) ;
        };
 
        return $connect;
    }
}


