<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\LicensePlateID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_RoadTransport.html.
 */
final class RoadTransport implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:RoadTransport';

    public readonly LicensePlateID $LicensePlateID; // [1..1]    The license plate identifier of this vehicle.

    public function __construct(LicensePlateID $LicensePlateID)
    {
        $this->LicensePlateID = $LicensePlateID;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->LicensePlateID;

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
