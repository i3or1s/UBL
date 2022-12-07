<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdDecimal;
use i3or1s\UBL\Basic\XsdString;
use i3or1s\UBL\Util\AttributeBuilder;

/**
 * http://www.datypic.com/sc/ubl21/t-cct_QuantityType.html.
 */
abstract class QuantityType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:QuantityType';

    public readonly XsdDecimal $value;

    public readonly ?NormalizedString $unitCode; //	[0..1]	xsd:normalizedString	The unit of the quantity
    public readonly ?NormalizedString $unitCodeListID; //	[0..1]	xsd:normalizedString	The quantity unit code list.
    public readonly ?NormalizedString $unitCodeListAgencyID; //	[0..1]	xsd:normalizedString	The identification of the agency that maintains the quantity unit code list
    public readonly ?XsdString $unitCodeListAgencyName; //	[0..1]	xsd:string	The name of the agency which maintains the quantity unit code list.

    public function __construct(XsdDecimal $value, ?NormalizedString $unitCode, ?NormalizedString $unitCodeListID, ?NormalizedString $unitCodeListAgencyID, ?XsdString $unitCodeListAgencyName)
    {
        $this->value = $value;
        $this->unitCode = $unitCode;
        $this->unitCodeListID = $unitCodeListID;
        $this->unitCodeListAgencyID = $unitCodeListAgencyID;
        $this->unitCodeListAgencyName = $unitCodeListAgencyName;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'unitCode', 'unitCodeListID', 'unitCodeListAgencyID', 'unitCodeListAgencyName',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
