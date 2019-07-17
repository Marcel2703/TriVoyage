<?php

namespace CarteEmbarquement;

/**
 * Interface CarteCommanderInterface
 *
 * Cette interface définit l'exigence minimale
 * pour une carte d’embarquement pouvant être commandée sur
 * c'est l'origine et le départ
 *
 * @package CarteEmbarquement
 */
interface CarteCommanderInterface
{
    /**
     * La désignation de l'origine
     *
     * assurez-vous d'utiliser la valeur exacte de la carte
     * qui partagent la même origine (ou départ)
     *
     * e.g: Paris, OR Tambo, NYC, Lubumbashi
     *
     * @return string
     */
    public function getOrigin();

    /**
     * La désignation de l'origine
     *
     * assurez-vous d'utiliser la valeur exacte de la carte
     * qui partagent la même origine (ou départ)
     *
     * e.g: Paris, OR Tambo, NYC, Lubumbashi
     *
     * @return string
     */
    public function getDestination();

}
