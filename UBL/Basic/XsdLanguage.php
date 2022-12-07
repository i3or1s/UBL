<?php

namespace i3or1s\UBL\Basic;

/**
 * http://www.datypic.com/sc/xsd/t-xsd_language.html.
 */
final class XsdLanguage implements \Stringable
{
    public readonly string $value;

    public function __construct(string $value)
    {
        if (!preg_match('#[a-zA-Z]{1,8}(-[a-zA-Z0-9]{1,8})*#', $value)) {
            throw new \RuntimeException('Invalid language pattern');
        }
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
