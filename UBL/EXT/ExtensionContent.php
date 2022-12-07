<?php

namespace i3or1s\UBL\EXT;

/**
 * http://www.datypic.com/sc/ubl21/e-ext_ExtensionContent.html.
 */
final class ExtensionContent implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'ext:ExtensionContent';

    public readonly string|object $content; // Any element [1..1] Namespace: ##other, Process Contents: lax

    public function __construct(string|object $content)
    {
        $this->content = $content;
    }

    public function __toString()
    {
        $response = [];
        if (is_string($this->content)) {
            $response[] = $this->content;
        }
        if ($this->content instanceof \Stringable) {
            $response[] = (string) $this->content;
        }

        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
