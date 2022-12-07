<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_base64Binary.html.
 */
final class XsdBase64Binary implements \Stringable
{
    public readonly string $value;

    public function __construct(string $value)
    {
        // @todo: implement validation
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
