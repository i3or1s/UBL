<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CalculationMethodCode;
use i3or1s\UBL\CBC\FullnessIndicationCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_EmissionCalculationMethod.html.
 */
final class EmissionCalculationMethod implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:EmissionCalculationMethod';

    public readonly ?CalculationMethodCode $CalculationMethodCode; // [0..1]    A code signifying the method used to calculate the emission.
    public readonly ?FullnessIndicationCode $FullnessIndicationCode; // [0..1]    A code signifying whether a piece of transport equipment is full, partially full, or empty. This indication is used as a parameter when calculating the environmental emission.
    public readonly ?MeasurementFromLocation $MeasurementFromLocation; // [0..1]    A start location from which an environmental emission is calculated.
    public readonly ?MeasurementToLocation $MeasurementToLocation; // [0..1]    An end location to which an environmental emission is calculated.

    public function __construct(?CalculationMethodCode $CalculationMethodCode, ?FullnessIndicationCode $FullnessIndicationCode, ?MeasurementFromLocation $MeasurementFromLocation, ?MeasurementToLocation $MeasurementToLocation)
    {
        $this->CalculationMethodCode = $CalculationMethodCode;
        $this->FullnessIndicationCode = $FullnessIndicationCode;
        $this->MeasurementFromLocation = $MeasurementFromLocation;
        $this->MeasurementToLocation = $MeasurementToLocation;
    }

    public function __toString()
    {
        $response = [];
        if ($this->CalculationMethodCode) {
            $response[] = (string) $this->CalculationMethodCode;
        }
        if ($this->FullnessIndicationCode) {
            $response[] = (string) $this->FullnessIndicationCode;
        }
        if ($this->MeasurementFromLocation) {
            $response[] = (string) $this->MeasurementFromLocation;
        }
        if ($this->MeasurementToLocation) {
            $response[] = (string) $this->MeasurementToLocation;
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
