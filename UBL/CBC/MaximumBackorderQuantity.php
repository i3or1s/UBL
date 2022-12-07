<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\QuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_MaximumBackorderQuantity.html.
 */
final class MaximumBackorderQuantity extends QuantityType
{
    protected const ELEMENT_SIGNATURE = 'cbc:MaximumBackorderQuantity';
}
