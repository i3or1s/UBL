<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\EnvironmentalEmissionTypeCode;
use i3or1s\UBL\CBC\ValueMeasure;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_EnvironmentalEmission.html.
 */
final class EnvironmentalEmission implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:EnvironmentalEmission';

    public readonly EnvironmentalEmissionTypeCode $EnvironmentalEmissionTypeCode; // [1..1]    A code specifying the type of environmental emission.
    public readonly ValueMeasure $ValueMeasure; // [1..1]    A value measurement for the environmental emission.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this environmental emission.
    /** @var EmissionCalculationMethod[]|null */
    public readonly ?array $EmissionCalculationMethod; // [0..*]    A method used to calculate the amount of this emission.

    /**
     * @param Description[]|null               $Description
     * @param EmissionCalculationMethod[]|null $EmissionCalculationMethod
     */
    public function __construct(EnvironmentalEmissionTypeCode $EnvironmentalEmissionTypeCode, ValueMeasure $ValueMeasure, ?array $Description, ?array $EmissionCalculationMethod)
    {
        $this->EnvironmentalEmissionTypeCode = $EnvironmentalEmissionTypeCode;
        $this->ValueMeasure = $ValueMeasure;
        $this->Description = $Description;
        $this->EmissionCalculationMethod = $EmissionCalculationMethod;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->EnvironmentalEmissionTypeCode;
        $response[] = (string) $this->ValueMeasure;
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->EmissionCalculationMethod) {
            foreach ($this->EmissionCalculationMethod as $elem) {
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
