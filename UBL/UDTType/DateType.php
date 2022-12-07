<?php

namespace i3or1s\UBL\UDTType;

use i3or1s\UBL\Basic\XsdDate;

/**
 * http://www.datypic.com/sc/ubl21/t-udt_DateType.html.
 */
abstract class DateType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'custom:DateType';

    public readonly XsdDate $value;

    public function __construct(string $date)
    {
        $this->value = new XsdDate($date);
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
