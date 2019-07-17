<?php

namespace Trieur;


use CarteEmbarquement\GenericCarteEmbarquement;

class TrieurCarteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GenericCarteEmbarquement
     */
    protected $boardingCardOrigin;
    /**
     * @var GenericCarteEmbarquement
     */
    protected $boardingCardStopover;
    /**
     * @var GenericCarteEmbarquement
     */
    protected $boardingCardDestination;

    public function setUp()
    {
        $this->boardingCardOrigin = new GenericCarteEmbarquement();
        $this->boardingCardOrigin->setDestination('Oslo')
            ->setMean('A380')
            ->setOrigin('Lubumbashi')
            ->setOtherInformation("You may want to get covered before landing. It's freezing")
            ->setSeat('B12')
            ->setTransport('Plane');

        $this->boardingCardStopover = new GenericCarteEmbarquement();
        $this->boardingCardStopover->setTransport('Boat')
            ->setSeat(null)
            ->setOtherInformation("Don't forget your security vest")
            ->setOrigin('Oslo')
            ->setMean("The ebony")
            ->setDestination("Copenhagen");

        $this->boardingCardDestination = new GenericCarteEmbarquement();
        $this->boardingCardDestination->setDestination('Athens')
            ->setMean('BG980I3')
            ->setOrigin('Copenhagen')
            ->setOtherInformation(null)
            ->setSeat('Pres1')
            ->setTransport('Bus');
    }

    public function testOrdersTheBoardingCard()
    {
        $trip = [
            $this->boardingCardDestination,
            $this->boardingCardOrigin,
            $this->boardingCardStopover
        ];

        $sorter = new TrieurCarte();

        $orderedTrip = $sorter->sort($trip);

        $this->assertCount(3, $orderedTrip);
        $this->assertTrue($orderedTrip instanceof \Iterator);

        $this->assertEquals($this->boardingCardOrigin, $orderedTrip[0]);
        $this->assertEquals($this->boardingCardStopover, $orderedTrip[1]);
        $this->assertEquals($this->boardingCardDestination, $orderedTrip[2]);

        shuffle($trip);

        $orderedTrip = $sorter->sort($trip);

        $this->assertEquals($this->boardingCardOrigin, $orderedTrip[0]);
        $this->assertEquals($this->boardingCardStopover, $orderedTrip[1]);
        $this->assertEquals($this->boardingCardDestination, $orderedTrip[2]);
    }

    public function testThrowsAnExceptionIfNonContinuesTrip()
    {
        $trip = [
            $this->boardingCardDestination,
            $this->boardingCardOrigin
        ];

        $sorter = new TrieurCarte();

        $this->expectException(NonContinuesTripException::class);
        $sorter->sort($trip);
    }

    public function testThrowsAnExceptionIfANonOrderableBoardingCardIsProvided()
    {
        $trip = [
            $this->boardingCardDestination,
            $this->boardingCardOrigin,
            $this->boardingCardStopover,
            ''
        ];

        $sorter = new TrieurCarte();

        $this->expectException(\InvalidArgumentException::class);
        $sorter->sort($trip);
    }
}

