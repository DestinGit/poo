<?php
namespace POO;

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 08/08/2017
 * Time: 11:11
 */
class Auteur
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nom;
    /**
     * @var
     */
    private $prenom;

//    /**
//     * Auteur constructor.
//     * @param $nom
//     * @param $prenom
//     */
//    public function __construct($nom, $prenom)
//    {
//        $this->nom = $nom;
//        $this->prenom = $prenom;
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Auteur
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Auteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }



}