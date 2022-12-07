<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_decimal.html.
 */
final class XsdDecimal implements \Stringable
{
    public readonly float $value;

    public function __construct(string|int|float $value)
    {
        if (!is_numeric($value)) {
            throw new \RuntimeException('Invalid decimal value');
        }
        $this->value = (float) $value;
    }

    public function __toString()
    {
        return (string) $this->value;
    }
}
