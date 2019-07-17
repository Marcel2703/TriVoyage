<?php

namespace Formateur;


use Trieur\TrieurCarteInterface;

interface FormatteurInterface
{
    /**
     * Renvoie la version formatée du voyage fournie
     * @param array $trip
     * @throws \InvalidArgumentException si le trieur n'est pas spécifié
     * @throws \InvalidArgumentException si le tableau de voyage est vide
     * @return mixed
     */
    public function format(array $trip);

    /**
     * @param TrieurCarteInterface $boardingCardSorter
     * @return mixed
     */
    public function setSorter(TrieurCarteInterface $boardingCardSorter);
}
