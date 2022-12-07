<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdDecimal;
use i3or1s\UBL\Util\AttributeBuilder;

/**
 * http://www.datypic.com/sc/ubl21/t-cct_AmountType.html.
 */
abstract class AmountType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:AmountType';

    public readonly XsdDecimal $value;

    public readonly ?NormalizedString $currencyID; //	[0..1]	xsd:normalizedString	The currency of the amount.
    public readonly ?NormalizedString $currencyCodeListVersionID; //	[0..1]	xsd:normalizedString	The VersionID of the UN/ECE Rec9 code list.

    public function __construct(XsdDecimal $value, ?NormalizedString $currencyID, ?NormalizedString $currencyCodeListVersionID)
    {
        $this->value = $value;
        $this->currencyID = $currencyID;
        $this->currencyCodeListVersionID = $currencyCodeListVersionID;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'currencyID', 'currencyCodeListVersionID',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
