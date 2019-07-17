<?php

namespace Trieur;

/**
 * Interface TrieurCarteInterface
 * @package Trieur
 */
interface TrieurCarteInterface
{
    /**
     * Commande un tableau d'objets d'interface de carte d'embarquement ordonnables non ordonnés
     *
     * @param array $boardingCards
     * @return \Iterator
     * @throws NonContinuesTripException si le voyage ne continue pass
     * @throws \InvalidArgumentException si un article qui ne met pas en œuvre l'interface Interface de carte d'embarquement ordonnable
     */
    public function sort(array $boardingCards);
}
