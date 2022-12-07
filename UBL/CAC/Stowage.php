<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\LocationID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Stowage.html.
 */
final class Stowage implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:Stowage';

    public readonly ?LocationID $LocationID; // [0..1]    An identifier for the location.
    /** @var \i3or1s\UBL\CBC\Location[]|null */
    public readonly ?array $Location; // [0..*]    Text describing the location.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of this stowage.

    /**
     * @param \i3or1s\UBL\CBC\Location[]|null $Location
     * @param MeasurementDimension[]|null    $MeasurementDimension
     */
    public function __construct(?LocationID $LocationID, ?array $Location, ?array $MeasurementDimension)
    {
        $this->LocationID = $LocationID;
        $this->Location = $Location;
        $this->MeasurementDimension = $MeasurementDimension;
    }

    public function __toString()
    {
        $response = [];
        if ($this->LocationID) {
            $response[] = (string) $this->LocationID;
        }
        if ($this->Location) {
            foreach ($this->Location as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
                $response[] = (string) $elem;
            }
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
