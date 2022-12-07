<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\AmountType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_CorporateStockAmount.html.
 */
final class CorporateStockAmount extends AmountType
{
    protected const ELEMENT_SIGNATURE = 'cbc:CorporateStockAmount';
}
