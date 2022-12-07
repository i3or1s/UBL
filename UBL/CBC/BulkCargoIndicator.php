<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\IndicatorType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_BulkCargoIndicator.html.
 */
final class BulkCargoIndicator extends IndicatorType
{
    protected const ELEMENT_SIGNATURE = 'cbc:BulkCargoIndicator';
}
