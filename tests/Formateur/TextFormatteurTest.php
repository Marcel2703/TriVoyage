<?php

use Formateur\TextFormatteur;
use CarteEmbarquement\GenericCarteEmbarquement;
use Trieur\TrieurCarte;

class TextFormatteurTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $trip;

    /**
     * @var string
     */
    protected $text;

    public function setUp()
    {
        $this->trip = [];

        $boardingCardOrigin = new GenericCarteEmbarquement();
        $boardingCardOrigin->setDestination('Oslo')
            ->setMean('A380')
            ->setOrigin('Lubumbashi')
            ->setOtherInformation("You may want to get covered before landing. It's freezing")
            ->setSeat('B12')
            ->setTransport('Plane');

        $boardingCardDestination = new GenericCarteEmbarquement();
        $boardingCardDestination->setDestination('Athens')
            ->setMean('BG980I3')
            ->setOrigin('Copenhagen')
            ->setOtherInformation(null)
            ->setSeat('Pres1')
            ->setTransport('Bus');

        $boardingCardStopover = new GenericCarteEmbarquement();
        $boardingCardStopover->setTransport('Boat')
            ->setSeat(null)
            ->setOtherInformation("Don't forget your security vest")
            ->setOrigin('Oslo')
            ->setMean("The ebony")
            ->setDestination("Copenhagen");


        $this->trip[] = $boardingCardStopover;
        $this->trip[] = $boardingCardDestination;
        $this->trip[] = $boardingCardOrigin;

        $this->text = "1. From Lubumbashi, Take the Plane A380 to Oslo. Your seat is B12. You may want to get covered before landing. It's freezing.\n";
        $this->text .= "2. From Oslo, Take the Boat The ebony to Copenhagen. No particular sit is assigned for you. Don't forget your security vest.\n";
        $this->text .= "3. From Copenhagen, Take the Bus BG980I3 to Athens. Your seat is Pres1.\n";
        $this->text .= "4. You have arrived at your final destination.";

    }

    public function testOutputFormatedText()
    {
        $formatter = new TextFormatteur();
        $formatter->setSorter(new TrieurCarte());
        $text = $formatter->format($this->trip);
        $this->assertEquals($this->text, $text);
    }

    public function testExceptionIfSorterNotProvided()
    {
        $formatter = new TextFormatteur();

        $this->expectException(\InvalidArgumentException::class);
        $formatter->format($this->trip);
    }
    public function testExceptionIfTripEmpty()
    {
        $formatter = new TextFormatteur();


        $this->expectException(\InvalidArgumentException::class);
        $formatter->setSorter(new TrieurCarte());
        $formatter->format([]);
    }
}

