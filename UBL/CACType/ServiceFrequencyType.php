<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\WeekDayCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ServiceFrequencyType.html.
 */
abstract class ServiceFrequencyType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ServiceFrequencyType';

    public readonly WeekDayCode $WeekDayCode; // [1..1]    A day of the week, expressed as code.

    public function __construct(WeekDayCode $WeekDayCode)
    {
        $this->WeekDayCode = $WeekDayCode;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->WeekDayCode;

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
