<?php

namespace i3or1s\UBL\EXT;

final class UBLExtensions implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'ext:UBLExtensions';

    /** @var UBLExtension[] */
    public readonly array $UBLExtension; // [1..*]     A single extension for private use.

    /**
     * @param UBLExtension[] $UBLExtension
     */
    public function __construct(array $UBLExtension)
    {
        $this->UBLExtension = $UBLExtension;
    }

    public function __toString()
    {
        $response = [];
        foreach ($this->UBLExtension as $elem) {
            $response[] = (string) $elem;
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
