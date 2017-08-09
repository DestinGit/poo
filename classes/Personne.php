<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/08/2017
 * Time: 10:20
 */

namespace POO;


/**
 * Class Personne
 */
class Personne {
    /**
     * @var string
     */
    private $nom;
    /**
     * @var int
     */
    private $poids;

    /**
     * Personne constructor.
     * @param string $nom
     * @param int $poids
     */
    public function __construct(string $nom, int $poids)
    {
        $this->nom;
        $this->poids;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

}