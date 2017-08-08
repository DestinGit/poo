<?php


interface Ifindable
{
    public function findOneById(int $id);

    public function findAll(array $orderBy = [], int $limit = null, int $offset = null);

    public function find(array $search, array $orderBy = [], int $limit = null, int $offset = null);

}