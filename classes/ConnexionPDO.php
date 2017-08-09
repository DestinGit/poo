<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/08/2017
 * Time: 11:34
 */

namespace POO;


class ConnexionPDO
{
    /**
     * @var \PDO
     */
    private static $instance;

    private function __construct()
    {
    }

    function __clone()
    {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8',
                'root','',[\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION]);
        }

        return self::$instance;
    }
}