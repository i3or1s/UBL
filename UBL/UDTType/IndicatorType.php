<?php

namespace i3or1s\UBL\UDTType;

use i3or1s\UBL\Basic\XsdBoolean;

/**
 * http://www.datypic.com/sc/ubl21/t-udt_IndicatorType.html.
 */
abstract class IndicatorType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'udt:IndicatorType';

    public readonly XsdBoolean $value;

    public function __construct(bool|int|string $value)
    {
        $this->value = new XsdBoolean($value);
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
