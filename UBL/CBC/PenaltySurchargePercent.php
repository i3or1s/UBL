<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\NumericType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_PenaltySurchargePercent.html.
 */
final class PenaltySurchargePercent extends NumericType
{
    protected const ELEMENT_SIGNATURE = 'cbc:PenaltySurchargePercent';
}
