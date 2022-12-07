<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_anyURI.html.
 */
final class AnyURI implements \Stringable
{
    public readonly string $value;

    public function __construct(string $value)
    {
        $this->value = urlencode($value);
    }

    public function __toString()
    {
        return $this->value;
    }
}
