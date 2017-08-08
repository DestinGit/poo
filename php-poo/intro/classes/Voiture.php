<?php


class Voiture
{
    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $modele;

    /**
     * @var int
     */
    private $nbPortes;

    /**
     * poids en kg
     * @var int
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
                                string $modele, int $nbPortes,
                                int $poids, int $nbPlace,
                                Moteur $moteur
    )
    {

        $this->marque = $marque;
        $this->modele = $modele;
        $this->nbPortes = $nbPortes;
        $this->poids = $poids;
        $this->nbPlace = $nbPlace;
        $this->moteur = $moteur;
    }

    /**
     * @param Personne $passager
     * @return Voiture
     * @throws Exception
     */
    public function ajouterPassager(Personne $passager):Voiture {
        //Contrôle du nombre de passager
        if(count($this->passagers) >= $this->nbPlace){
            throw new Exception("Le nombre de passager ne peut dépasser le nombre de place");
        }

        //ajout d'un passager
        $this->passagers[] = $passager;

        return $this;
    }

    public function getPoidsTotalEnCharge(){
        $poidTotal = $this->poids;
        foreach ($this->passagers as $passager){
            $poidTotal += $passager->getPoids();
        }

        return $poidTotal;
    }

    /**
     * @return int
     */
    public function getPoids():int{
        return $this->poids;
    }

    /**
     * @return string
     */
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * @return string
     */
    public function getModele(): string
    {
        return $this->modele;
    }

    /**
     * @return int
     */
    public function getNbPortes(): int
    {
        return $this->nbPortes;
    }

    /**
     * @return int
     */
    public function getNbPlace(): int
    {
        return $this->nbPlace;
    }

    /**
     * @return float
     */
    public function getVitesseMax():float {
        return $this->moteur->getPuissance() / $this->getPoidsTotalEnCharge();
    }

    function __toString():string
    {
        return "ma voiture {$this->marque} {$this->modele} roule à {$this->getVitesseMax()} km/h";
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
    public function setMoteur(Moteur $moteur): Voiture
    {
        $this->moteur = $moteur;
        return $this;
    }

    /**
     * @param string $marque
     * @return Voiture
     */
    public function setMarque(string $marque): Voiture
    {
        if(empty($marque)){
            throw new InvalidArgumentException("La marque ne peut être vide");
        }
        $this->marque = $marque;
        return $this;
    }

    /**
     * @param string $modele
     * @return Voiture
     */
    public function setModele(string $modele): Voiture
    {
        if(empty($modele)){
            throw new InvalidArgumentException("Le modèle ne peut être vide");
        }
        $this->modele = $modele;
        return $this;
    }

    /**
     * @param int $nbPortes
     * @return Voiture
     */
    public function setNbPortes(int $nbPortes): Voiture
    {
        if($nbPortes <2 || $nbPortes >5){
            throw new InvalidArgumentException("Le nombre de portes doit être compris entre 2 et 5");
        }
        $this->nbPortes = $nbPortes;
        return $this;
    }

    /**
     * @param int $poids
     * @return Voiture
     */
    public function setPoids(int $poids): Voiture
    {
        if($poids <=200 || $poids > 3500){
            throw new InvalidArgumentException("Le poids est incohérent");
        }
        $this->poids = $poids;
        return $this;
    }

    /**
     * @param int $nbPlace
     * @return Voiture
     */
    public function setNbPlace(int $nbPlace): Voiture
    {
        if($nbPlace <=0 || $nbPlace >9){
            throw new InvalidArgumentException("Le nombre de places doit être compris entre 1 et 9");
        }
        $this->nbPlace = $nbPlace;
        return $this;
    }
}

class Moteur {
    /**
     * @var int
     */
    private $puissance;

    /**
     * Moteur constructor.
     * @param int $puissance
     */
    public function __construct(int $puissance)
    {
        $this->puissance = $puissance;
    }

    /**
     * @return int
     */
    public function getPuissance(): int
    {
        return $this->puissance;
    }

    /**
     * @param int $puissance
     * @return Moteur
     */
    public function setPuissance(int $puissance): Moteur
    {
        $this->puissance = $puissance;
        return $this;
    }
}

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
        $this->nom = $nom;
        $this->poids = $poids;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Personne
     */
    public function setNom(string $nom): Personne
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return int
     */
    public function getPoids(): int
    {
        return $this->poids;
    }

    /**
     * @param int $poids
     * @return Personne
     */
    public function setPoids(int $poids): Personne
    {
        $this->poids = $poids;
        return $this;
    }




}