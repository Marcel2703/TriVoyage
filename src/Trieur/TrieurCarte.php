<?php

namespace Trieur;

use CarteEmbarquement\GenericCarteEmbarquement;
use CarteEmbarquement\CarteCommanderInterface;

/**
 * Class TrieurCarte
 * @package Trieur
 */
class TrieurCarte implements TrieurCarteInterface
{
    /**
     * @inheritDoc
     */
    public function sort(array $boardingCards)
    {
        $sortedCards = [];
        $head = null;
        $tail = null;

        do {
            if (count($sortedCards) == 0) {
                /**
                 * @var CarteCommanderInterface $card
                 */
                $card = array_shift($boardingCards);
                if (!$card instanceof CarteCommanderInterface) {
                    throw new \InvalidArgumentException(sprintf('Expected instance of OrderableBoardingCardInterface, %s given', gettype($card)));
                }
                $head = $card->getOrigin();
                $tail = $card->getDestination();
                $sortedCards[] = $card;
            }
            $sizeBeforeTheLoop = count($boardingCards);
            $currentCount = count($boardingCards);
            /**
             * @var GenericCarteEmbarquement $card
             */
            for($i = 0; $i < $currentCount; $i++) {
                $card = $boardingCards[$i];

                if (!$card instanceof CarteCommanderInterface) {
                    throw new \InvalidArgumentException(sprintf('Expected instance of OrderableBoardingCardInterface, %s given', gettype($card)));
                }

                if ($card->getOrigin() == $tail) {
                    $tail = $card->getDestination();

                    array_push($sortedCards, $card);

                    array_splice($boardingCards, $i , 1);
                    $i--;
                    $currentCount--;
                } else if ($card->getDestination() == $head) {
                    $head = $card->getOrigin();

                    array_unshift($sortedCards, $card);

                    array_splice($boardingCards, $i , 1);
                    $i--;
                    $currentCount--;
                }
            }

            if ($sizeBeforeTheLoop > 0 && $sizeBeforeTheLoop == count($boardingCards)) {
                throw new NonContinuesTripException("The trip is not continues");
            }
        } while (count($boardingCards) > 0);

        return new \ArrayIterator($sortedCards);
    }
}
