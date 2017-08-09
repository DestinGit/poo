<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/08/2017
 * Time: 10:20
 */

namespace POO;


/**
 * Class Moteur
 */
class Moteur {
    /**
     * @var int
     */
    private $puissance;

    public function __construct(int $puissance)
    {
        $this->puissance = $puissance;
    }

    /**
     * @return int
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * @param int $puissance
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;
    }
}
