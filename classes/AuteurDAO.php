<?php

class AuteurDAO implements IPersistable
{

    const TABLE_NAME = 'auteurs';
    /**
     * @var PDO
     */
    private $pdo;

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

}