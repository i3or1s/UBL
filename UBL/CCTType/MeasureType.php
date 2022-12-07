<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdDecimal;
use i3or1s\UBL\Util\AttributeBuilder;

/**
 * http://www.datypic.com/sc/ubl21/t-cct_MeasureType.html.
 */
abstract class MeasureType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:MeasureType';

    public readonly XsdDecimal $value;

    public readonly ?NormalizedString $unitCode;    //	[0..1]	xsd:normalizedString	The type of unit of measure.
    public readonly ?NormalizedString $unitCodeListVersionID;   //	[0..1]	xsd:normalizedString	The version of the measure unit code list.

    public function __construct(XsdDecimal $value, ?NormalizedString $unitCode, ?NormalizedString $unitCodeListVersionID)
    {
        $this->value = $value;
        $this->unitCode = $unitCode;
        $this->unitCodeListVersionID = $unitCodeListVersionID;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'unitCode', 'unitCodeListVersionID',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
