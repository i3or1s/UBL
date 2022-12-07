<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\QuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_OversupplyQuantity.html.
 */
final class OversupplyQuantity extends QuantityType
{
    protected const ELEMENT_SIGNATURE = 'cbc:OversupplyQuantity';
}
