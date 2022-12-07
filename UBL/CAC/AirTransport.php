<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\AircraftID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AirTransport.html.
 */
final class AirTransport implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:AirTransport';

    public readonly AircraftID $AircraftID; // [1..1]    An identifer for a specific aircraft.

    public function __construct(AircraftID $AircraftID)
    {
        $this->AircraftID = $AircraftID;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->AircraftID;

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
