<?php
namespace POO\DAO;
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 08/08/2017
 * Time: 11:23
 */
interface Ifindable
{
    public function findOneById(int $id);

    public function findAll(array $orderBy = [], int $limit, int $offset);

    public function find(array $search, array $orderBy = [], int $limit, int $offset);
}