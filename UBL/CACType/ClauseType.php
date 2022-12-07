<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\Content;
use i3or1s\UBL\CBC\ID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ClauseType.html.
 */
abstract class ClauseType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ClauseType';

    public readonly ?ID $ID; // [0..1]    An identifier for this clause.
    /** @var Content[]|null */
    public readonly ?array $Content; // [0..*]    The text of this clause.

    /**
     * @param Content[]|null $Content
     */
    public function __construct(?ID $ID, ?array $Content)
    {
        $this->ID = $ID;
        $this->Content = $Content;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Content) {
            foreach ($this->Content as $elem) {
                $response[] = (string) $elem;
            }
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
