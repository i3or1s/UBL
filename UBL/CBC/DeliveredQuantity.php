<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\QuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_DeliveredQuantity.html.
 */
final class DeliveredQuantity extends QuantityType
{
    protected const ELEMENT_SIGNATURE = 'cbc:DeliveredQuantity';
}
