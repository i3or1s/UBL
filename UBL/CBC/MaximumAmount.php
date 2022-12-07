<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\AmountType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_MaximumAmount.html.
 */
final class MaximumAmount extends AmountType
{
    protected const ELEMENT_SIGNATURE = 'cbc:MaximumAmount';
}
