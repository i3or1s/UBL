<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\QuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_BaseQuantity.html.
 */
final class BaseQuantity extends QuantityType
{
    protected const ELEMENT_SIGNATURE = 'cbc:BaseQuantity';
}
