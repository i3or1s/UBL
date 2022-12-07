<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\IndicatorType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_FreeOfChargeIndicator.html.
 */
final class FreeOfChargeIndicator extends IndicatorType
{
    protected const ELEMENT_SIGNATURE = 'cbc:FreeOfChargeIndicator';
}
