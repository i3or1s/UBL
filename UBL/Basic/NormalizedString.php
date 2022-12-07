<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_normalizedString.html.
 */
final class NormalizedString implements \Stringable
{
    public readonly XsdString $value;

    public function __construct(string $value)
    {
        $parsedValue = str_replace(PHP_EOL, ' ', $value);
        $parsedValue = str_replace('\t', ' ', $parsedValue);
        $this->value = new XsdString($parsedValue);
    }

    public function __toString()
    {
        return (string) $this->value;
    }
}
