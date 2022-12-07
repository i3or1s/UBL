<?php

namespace i3or1s\UBL\UDTType;

use i3or1s\UBL\Basic\XsdTime;

/**
 * http://www.datypic.com/sc/ubl21/t-udt_TimeType.html.
 */
abstract class TimeType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cbc:TimeType';

    public readonly XsdTime $value;

    public function __construct(string $date)
    {
        $this->value = new XsdTime($date);
    }

    public function __toString()
    {
        return sprintf(
            '<%s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
