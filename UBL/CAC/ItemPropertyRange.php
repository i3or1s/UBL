<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\MaximumValue;
use i3or1s\UBL\CBC\MinimumValue;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ItemPropertyRange.html.
 */
final class ItemPropertyRange implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ItemPropertyRange';

    public readonly ?MinimumValue $MinimumValue; // [0..1]    The minimum value in this range of values.
    public readonly ?MaximumValue $MaximumValue; // [0..1]    The maximum value in this range of values.

    public function __construct(?MinimumValue $MinimumValue, ?MaximumValue $MaximumValue)
    {
        $this->MinimumValue = $MinimumValue;
        $this->MaximumValue = $MaximumValue;
    }

    public function __toString()
    {
        $response = [];
        if ($this->MinimumValue) {
            $response[] = (string) $this->MinimumValue;
        }
        if ($this->MaximumValue) {
            $response[] = (string) $this->MaximumValue;
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
