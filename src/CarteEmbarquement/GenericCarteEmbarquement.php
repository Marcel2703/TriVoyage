<?php

namespace CarteEmbarquement;

/**
 * Class GenericCarteEmbarquement
 * Une classe d'embarquement générique, c'est la mise en œuvre la plus simple d'une classe d'embarquement.
 *
 * vous ne pouvez pas l'étendre, si vous voulez créer votre implémentation d'une classe d'embarquement,
 * implémenter l'interface
 *
 * @package CarteEmbarquement
 */
final class GenericCarteEmbarquement implements CarteEmbarquementInterface
{
    /**
     * @var string
     */
    private $seat;
    /**
     * @var string
     */
    private $mean;
    /**
     * @var string
     */
    private $transport;
    /**
     * @var string
     */
    private $otherInformation;
    /**
     * @var string
     */
    private $origin;
    /**
     * @var string
     */
    private $destination;


    /**
     * @inheritdoc
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param $seat
     * @return $this
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }


    /**
     * @inheritdoc
     */
    public function getMean()
    {
        return $this->mean;
    }

    /**
     * @param $mean
     * @return $this
     */
    public function setMean($mean)
    {
        $this->mean = $mean;

        return $this;
    }


    /**
     * @inheritdoc
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param $transport
     * @return $this
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }


    /**
     * @inheritdoc
     */
    public function getOtherInformation()
    {
        return $this->otherInformation;
    }

    /**
     * @param $otherInformation
     * @return $this
     */
    public function setOtherInformation($otherInformation)
    {
        $this->otherInformation = $otherInformation;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param $origin
     * @return $this
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }


    /**
     * @inheritdoc
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param $destination
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }
}
