<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_time.html.
 */
final class XsdTime implements \Stringable
{
    public readonly \DateTimeImmutable $value;

    public function __construct(string $value)
    {
        $this->value = new \DateTimeImmutable($value);
    }

    public function __toString()
    {
        return $this->value->format('H:i:s.v');
    }
}
