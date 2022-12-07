<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\AmountType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_PenaltyAmount.html.
 */
final class PenaltyAmount extends AmountType
{
    protected const ELEMENT_SIGNATURE = 'cbc:PenaltyAmount';
}
