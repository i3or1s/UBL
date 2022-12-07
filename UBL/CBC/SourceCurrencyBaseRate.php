<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\NumericType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_SourceCurrencyBaseRate.html.
 */
final class SourceCurrencyBaseRate extends NumericType
{
    protected const ELEMENT_SIGNATURE = 'cbc:SourceCurrencyBaseRate';
}
