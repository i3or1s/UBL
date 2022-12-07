<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\Basic\XsdTime;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ActualDeliveryTime.html.
 */
final class ActualDeliveryTime implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cbc:ActualDeliveryTime';

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
