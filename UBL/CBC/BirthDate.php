<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\Basic\XsdDate;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_BirthDate.html.
 */
final class BirthDate implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cbc:BirthDate';

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
