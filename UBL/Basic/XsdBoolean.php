<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_boolean.html.
 */
final class XsdBoolean implements \Stringable
{
    public readonly bool $value;

    public function __construct(bool|int|string $value)
    {
        if (is_string($value)) {
            if ('true' === $value) {
                $value = true;
            }
            if ('false' === $value) {
                $value = false;
            }
        }
        $this->value = (bool) $value;
    }

    public function __toString()
    {
        return $this->value ? 'true' : 'false';
    }
}
