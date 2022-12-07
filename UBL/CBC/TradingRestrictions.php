<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_TradingRestrictions.html.
 */
final class TradingRestrictions extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:TradingRestrictions';
}
