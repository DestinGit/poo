<?php

class AuteurDAO implements IPersistable, Ifindable
{

    const TABLE_NAME = 'auteurs';

    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var PDOStatement
     */
    private $selectStatement;

    /**
     * AuteurDAO constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function deleteOne(int $id)
    {
        $sql = "DELETE FROM auteurs " . self::TABLE_NAME . "WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        return $statement->execute([$id]);
    }

    public function save($dto)
    {
        if ($dto->getId() != null) {
            $this->update($dto);
        } else {
            $this->insert($dto);
        }
    }

    /**
     * @param Auteur $dto
     */
    private function update($dto)
    {
        $sql = 'UPDATE '. self::TABLE_NAME . ' SET
        nom= :nom, prenom =:prenom
        WHERE id=:id';
        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            'nom'=> $dto->getNom(),
            'prenom' => $dto->getPrenom(),
            'id' => $dto->getId()
        ]);
    }

    /**
     * @param Auteur $dto
     */
    private function insert($dto)
    {
        $sql = "INSERT INTO ". self::TABLE_NAME . "(nom, prenom)
                VALUES (:nom, :prenom)";

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            'nom'=> $dto->getNom(),
            'prenom' => $dto->getPrenom()
        ]);

        $dto->setId($this->pdo->lastInsertId());

    }

    /**
     * @param int $id
     * @return $this
     */
    public function findOneById(int $id)
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id = ?";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);

        $this->selectStatement = $statement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOneAsObject() {
        $this->selectStatement->setFetchMode(PDO::FETCH_CLASS, Auteur::class);
        return $this->selectStatement->fetch();
    }

    /**
     * @return mixed
     */
    public function getOneAsArray() {
        return $this->selectStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return $this
     */
    public function findAll(array $orderBy = [], int $limit = null, int $offset=null)
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME;

        $sql .= $this->getOrderBy($orderBy);

        $sql .= $this->getLimit($limit, $offset);

        $statement = $this->pdo->query($sql);

        $this->selectStatement = $statement;

        return $this;

    }

    /**
     * @return array
     */
    public function getAllAsObject() {
        $this->selectStatement->setFetchMode(PDO::FETCH_CLASS, Auteur::class);
        return $this->selectStatement->fetchAll();
    }

    /**
     * @return array
     */
    public function getAllAsArray() {
        return $this->selectStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param array $orderBy
     * @return string
     */
    private function getOrderBy(array $orderBy): string
    {
        $sql = '';

        if (count($orderBy) > 0) {
            $sql .= " ORDER BY ";
            $strOrder = "";
            foreach ($orderBy as $col => $order) {
                $strOrder .= str_replace(';', '', $col) . ' ' . str_replace(';', '', $order) . ',';
            }
            $strOrder = substr($strOrder, 0, strlen($strOrder) - 1);

            $sql .= $strOrder;
        }
        return $sql;
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return string
     */
    private function getLimit( $limit,  $offset): string
    {
        $sql = '';

        if (isset($limit)) {
            $sql .= " LIMIT $limit";
            if (isset($offset)) {
                $sql .= " OFFSET $offset ";
            }
        }

        return $sql;
    }

    public function find(array $search, array $orderBy = [], int $limit=null, int $offset=null)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME;

        $sql .= $this->getWhereClause($search);

        $sql .= $this->getOrderBy($orderBy);
        $sql .= $this->getLimit($limit, $offset);

        $statement = $this->pdo->prepare($sql);

        $statement->execute($search);

        $this->selectStatement = $statement;

        return $this;
    }

    private function getWhereClause($search) {
        $sql = '';

        if (count($search) > 0) {
            $sql .= ' WHERE ';

            $cols = array_map(function ($item) {
                    return "$item = :$item";
                }, array_keys($search)
            );

            $sql .= implode(' AND ', $cols);
        }

        return $sql;
    }
}