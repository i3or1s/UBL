<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_string.html.
 */
final class XsdString implements \Stringable
{
    public readonly string $value;

    public function __construct(string $value)
    {
        $this->value = htmlspecialchars($value);
    }

    public function __toString()
    {
        return $this->value;
    }
}
