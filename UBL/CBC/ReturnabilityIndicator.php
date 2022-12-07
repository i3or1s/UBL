<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\IndicatorType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ReturnabilityIndicator.html.
 */
final class ReturnabilityIndicator extends IndicatorType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ReturnabilityIndicator';
}
