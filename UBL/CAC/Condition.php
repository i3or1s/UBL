<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\AttributeID;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\MaximumMeasure;
use i3or1s\UBL\CBC\Measure;
use i3or1s\UBL\CBC\MinimumMeasure;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Condition.html.
 */
final class Condition implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:Condition';

    public readonly AttributeID $AttributeID; // [1..1]    An identifier for the attribute that applies to the condition.
    public readonly ?Measure $Measure; // [0..1]    The measurement value.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing the attribute that applies to the condition.
    public readonly ?MinimumMeasure $MinimumMeasure; // [0..1]    The minimum value in a range of measurement for this condition.
    public readonly ?MaximumMeasure $MaximumMeasure; // [0..1]    The maximum value in a range of measurement for this condition.

    /**
     * @param Description[]|null $Description
     */
    public function __construct(AttributeID $AttributeID, ?Measure $Measure, ?array $Description, ?MinimumMeasure $MinimumMeasure, ?MaximumMeasure $MaximumMeasure)
    {
        $this->AttributeID = $AttributeID;
        $this->Measure = $Measure;
        $this->Description = $Description;
        $this->MinimumMeasure = $MinimumMeasure;
        $this->MaximumMeasure = $MaximumMeasure;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->AttributeID;
        if ($this->Measure) {
            $response[] = (string) $this->Measure;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MinimumMeasure) {
            $response[] = (string) $this->MinimumMeasure;
        }
        if ($this->MaximumMeasure) {
            $response[] = (string) $this->MaximumMeasure;
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
