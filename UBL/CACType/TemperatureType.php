<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\AttributeID;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\Measure;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TemperatureType.html.
 */
abstract class TemperatureType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TemperatureType';

    public readonly AttributeID $AttributeID; // [1..1]    An identifier for this temperature measurement.
    public readonly Measure $Measure; // [1..1]    The value of this temperature measurement.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this temperature measurement.

    /**
     * @param Description[]|null $Description
     */
    public function __construct(AttributeID $AttributeID, Measure $Measure, ?array $Description)
    {
        $this->AttributeID = $AttributeID;
        $this->Measure = $Measure;
        $this->Description = $Description;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->AttributeID;
        $response[] = (string) $this->Measure;
        if ($this->Description) {
            foreach ($this->Description as $elem) {
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
