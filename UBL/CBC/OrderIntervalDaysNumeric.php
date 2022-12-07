<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\NumericType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_OrderIntervalDaysNumeric.html.
 */
final class OrderIntervalDaysNumeric extends NumericType
{
    protected const ELEMENT_SIGNATURE = 'cbc:OrderIntervalDaysNumeric';
}
