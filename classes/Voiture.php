<?php
namespace POO;

use POO\Moteur;
use  POO\Personne;

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 07/08/2017
 * Time: 10:59
 */
class Voiture
{
    /**
     * @var int
     */
    private $nbPortes;
    /**
     * @var string
     */
    private $marque;
    /**
     * @var string
     */
    private $modele;
    /**
     * @var
     */
    private $poids;
    /**
     * @var int
     */
    private $nbPlace;

    /**
     * @var Moteur
     */
    private $moteur;

    /**
     * @var array
     */
    private $passagers = [];

    /**
     * Voiture constructor.
     * @param string $marque
     * @param string $modele
     * @param int $nbPortes
     * @param int $poids
     * @param int $nbPlace
     * @param Moteur $moteur
     */
    public function __construct(string $marque,
                                string $modele,
                                int $nbPortes,
                                int $poids,
                                int $nbPlace,
                                Moteur $moteur
    )
    {
        $this->moteur = $moteur;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->poids = $poids;
        $this->nbPlace = $nbPlace;
        $this->nbPortes = $nbPortes;
    }

    /**
     * @return int
     */
    public function getNbPortes()
    {
        return $this->nbPortes;
    }

    /**
     * @param int $nbPortes
     * @return Voiture
     */
    public function setNbPortes($nbPortes)
    {
        $this->nbPortes = $nbPortes;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     * @return Voiture
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
        return $this;
    }

    /**
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param string $modele
     * @return Voiture
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
        return $this;
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
     * @return Voiture
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * @param int $nbPlace
     * @return Voiture
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;
        return $this;
    }

    /**
     * @return Moteur
     */
    public function getMoteur(): Moteur
    {
        return $this->moteur;
    }

    /**
     * @param Moteur $moteur
     * @return Voiture
     */
    public function setMoteur($moteur)
    {
        $this->moteur = $moteur;
        return $this;
    }

    /**
     * @return array
     */
    public function getPassagers(): array
    {
        return $this->passagers;
    }

    /**
     * @param array $passagers
     */
    public function setPassagers(array $passagers)
    {
        $this->passagers = $passagers;
    }

    /**
     * @param Personne $passager
     * @return Voiture
     * @throws Exception
     */
    public function ajouterPassager(Personne $passager):Voiture {

        if (count($this->passagers) >= $this->nbPlace) {
            throw new Exception('Le nombre de passager ne peut dépasser le nombre de place');
        }
        $this->passagers[] = $passager;

        return $this;
    }

    public function getPoidsTotalEnCharge() {
        $poidTotal = $this->poids;

        foreach ($this->passagers as $passager) {
            $poidTotal += $passager->getPoids();
        }

        return $poidTotal;
    }
    /**
     * @return float
     */
    public function getVitesseMax(): float {
        return $this->moteur->getPuissance() / $this->getPoidsTotalEnCharge();
    }

    /**
     * @return string
     */
    function __toString(): string
    {
        // TODO: Implement __toString() method.
        return "{$this->marque} {$this->modele} roule à {$this->getVitesseMax()} km/h";
    }

}