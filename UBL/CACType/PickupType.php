<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\PickupLocation;
use i3or1s\UBL\CAC\PickupParty;
use i3or1s\UBL\CBC\ActualPickupDate;
use i3or1s\UBL\CBC\ActualPickupTime;
use i3or1s\UBL\CBC\EarliestPickupDate;
use i3or1s\UBL\CBC\EarliestPickupTime;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\LatestPickupDate;
use i3or1s\UBL\CBC\LatestPickupTime;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PickupType.html.
 */
abstract class PickupType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PickupType';

    public readonly ?ID $ID; // [0..1]    An identifier for this pickup.
    public readonly ?ActualPickupDate $ActualPickupDate; // [0..1]    The actual pickup date.
    public readonly ?ActualPickupTime $ActualPickupTime; // [0..1]    The actual pickup time.
    public readonly ?EarliestPickupDate $EarliestPickupDate; // [0..1]    The earliest pickup date.
    public readonly ?EarliestPickupTime $EarliestPickupTime; // [0..1]    The earliest pickup time.
    public readonly ?LatestPickupDate $LatestPickupDate; // [0..1]    The latest pickup date.
    public readonly ?LatestPickupTime $LatestPickupTime; // [0..1]    The latest pickup time.
    public readonly ?PickupLocation $PickupLocation; // [0..1]    The pickup location.
    public readonly ?PickupParty $PickupParty; // [0..1]    The party responsible for picking up a delivery.

    public function __construct(?ID $ID, ?ActualPickupDate $ActualPickupDate, ?ActualPickupTime $ActualPickupTime, ?EarliestPickupDate $EarliestPickupDate, ?EarliestPickupTime $EarliestPickupTime, ?LatestPickupDate $LatestPickupDate, ?LatestPickupTime $LatestPickupTime, ?PickupLocation $PickupLocation, ?PickupParty $PickupParty)
    {
        $this->ID = $ID;
        $this->ActualPickupDate = $ActualPickupDate;
        $this->ActualPickupTime = $ActualPickupTime;
        $this->EarliestPickupDate = $EarliestPickupDate;
        $this->EarliestPickupTime = $EarliestPickupTime;
        $this->LatestPickupDate = $LatestPickupDate;
        $this->LatestPickupTime = $LatestPickupTime;
        $this->PickupLocation = $PickupLocation;
        $this->PickupParty = $PickupParty;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->ActualPickupDate) {
            $response[] = (string) $this->ActualPickupDate;
        }
        if ($this->ActualPickupTime) {
            $response[] = (string) $this->ActualPickupTime;
        }
        if ($this->EarliestPickupDate) {
            $response[] = (string) $this->EarliestPickupDate;
        }
        if ($this->EarliestPickupTime) {
            $response[] = (string) $this->EarliestPickupTime;
        }
        if ($this->LatestPickupDate) {
            $response[] = (string) $this->LatestPickupDate;
        }
        if ($this->LatestPickupTime) {
            $response[] = (string) $this->LatestPickupTime;
        }
        if ($this->PickupLocation) {
            $response[] = (string) $this->PickupLocation;
        }
        if ($this->PickupParty) {
            $response[] = (string) $this->PickupParty;
        }

        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
