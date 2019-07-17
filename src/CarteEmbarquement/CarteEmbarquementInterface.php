<?php

namespace CarteEmbarquement;

/**
 * Interface CarteEmbarquementInterface
 *
 * Cette interface
 * @package CarteEmbarquement
 */
interface CarteEmbarquementInterface extends CarteCommanderInterface
{
    /**
     * Renvoie la désignation du siège
     *
     * @return string|null
     */
    public function getSeat();

    /**
     * Renvoie la désignation du moyen de transport, par exemple: Train, avion
     * @return string
     */
    public function getTransport();

    /**
     * Retourne la désignation du moyen de transport,
     * en d'autres termes, le numéro de bus, le numéro d'avion,
     * le numéro de licence de la voiture Uber
     * @return string
     */
    public function getMean();

    /**
     * Toute autre information utile à connaître
     * @return string
     */
    public function getOtherInformation();

}
