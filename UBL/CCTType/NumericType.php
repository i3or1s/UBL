<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\XsdDecimal;
use i3or1s\UBL\Util\AttributeBuilder;

/**
 * http://www.datypic.com/sc/ubl21/t-cct_NumericType.html.
 */
abstract class NumericType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:NumericType';

    public readonly XsdDecimal $value;

    public readonly ?string $format; //	[0..1]	xsd:string	Whether the number is an integer, decimal, real number or percentage.

    public function __construct(XsdDecimal $value, ?string $format)
    {
        $this->value = $value;
        $this->format = $format;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'format',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
