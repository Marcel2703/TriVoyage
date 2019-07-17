<?php

namespace Formateur;


use CarteEmbarquement\CarteEmbarquementInterface;
use Trieur\TrieurCarteInterface;

/**
 * Class TextFormatteur
 * @package Formateur
 */
class TextFormatteur implements FormatteurInterface
{
    /**
     * @var TrieurCarteInterface
     */
    protected $sorter;
    /**
     * @inheritDoc
     */
    public function format(array $trip)
    {
        if (count($trip) == 0) {
            throw new \InvalidArgumentException("Le voyage est vide");
        }
        if (!$this->sorter instanceof TrieurCarteInterface) {
            throw new \InvalidArgumentException("Fournir d'abord une trieuse");
        }

        $trip = $this->sorter->sort($trip);

        $text = "";
        $count = 1;
        while ($trip->valid()) {
            $text .= ($trip->key() + 1) . ". ";
            $text .= $this->formatItem($trip->current());
            $trip->next();
            $count++;
        }



        return $text . $count . ". You have arrived at your final destination.";
    }

    /**
     * Format one boarding card object into human understandable text
     * @param CarteEmbarquementInterface $boardingCard
     * @return string
     */
    protected function formatItem(CarteEmbarquementInterface $boardingCard)
    {
        $text = sprintf(
            "From %s, Take the %s %s to %s.",
            $boardingCard->getOrigin(),
            $boardingCard->getTransport(),
            $boardingCard->getMean(),
            $boardingCard->getDestination()
        );

        if (!is_null($boardingCard->getSeat()) && strlen($boardingCard->getSeat()) > 0) {
            $text .= " Your seat is " . $boardingCard->getSeat() . ".";
        } else {
            $text .= " No particular sit is assigned for you.";
        }

        if (!is_null($boardingCard->getOtherInformation()) && strlen($boardingCard->getOtherInformation()) > 0) {
            $text .= " " . $boardingCard->getOtherInformation() . ".";
        }

        return $text . "\n";
    }

    /**
     * @inheritDoc
     */
    public function setSorter(TrieurCarteInterface $boardingCardSorter)
    {
        $this->sorter = $boardingCardSorter;
    }
}
