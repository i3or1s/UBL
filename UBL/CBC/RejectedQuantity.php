<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\QuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_RejectedQuantity.html.
 */
final class RejectedQuantity extends QuantityType
{
    protected const ELEMENT_SIGNATURE = 'cbc:RejectedQuantity';
}
