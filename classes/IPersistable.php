<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 08/08/2017
 * Time: 11:16
 */
interface IPersistable
{
    public function deleteOne(int $id);

    public function save($dto);

}