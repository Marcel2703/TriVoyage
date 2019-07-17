<?php

namespace CarteEmbarquement;

/**
 * Class GenericCarteEmbarquementTest
 * @package CarteEmbarquement
 */
class GenericCarteEmbarquementTest extends \PHPUnit_Framework_TestCase
{
    protected $seat;
    protected $mean;
    protected $transport;
    protected $otherInformation;
    protected $origin;
    protected $destination;

    public function setUp()
    {
        $this->seat = 'A1';
        $this->mean = 'AB345C';
        $this->transport = "Plane";
        $this->otherInformation = "Declare all food, chemical product and sharp object";
        $this->origin = "OR Tambo";
        $this->destination = "Dubai";
    }

    public function testSavesTheProvidedInformation()
    {
        $genericBoarding = new GenericCarteEmbarquement();

        $this->assertTrue($genericBoarding instanceof BoardingCardInterface, "The GenericBoardingCard class doesn't not implement the BoardingCardInterface");

        $genericBoarding->setSeat($this->seat);
        $this->assertEquals($genericBoarding->getSeat(), $this->seat, "The returned seat is not the one provided");

        $genericBoarding->setMean($this->mean);
        $this->assertEquals($genericBoarding->getMean(), $this->mean, "The returned mean is not the one provided");

        $genericBoarding->setTransport($this->transport);
        $this->assertEquals($genericBoarding->getTransport(), $this->transport, "The returned transport is not the one provided");

        $genericBoarding->setOtherInformation($this->otherInformation);
        $this->assertEquals($genericBoarding->getOtherInformation(), $this->otherInformation, "The returned otherInformation is not the one provided");

        $genericBoarding->setOrigin($this->origin);
        $this->assertEquals($genericBoarding->getOrigin(), $this->origin, "The returned origin is not the one provided");

        $genericBoarding->setDestination($this->destination);
        $this->assertEquals($genericBoarding->getDestination(), $this->destination, "The returned destination is not the one provided");

    }
}

