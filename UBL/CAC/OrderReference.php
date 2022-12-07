<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\OrderReferenceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_OrderReference.html.
 */
final class OrderReference extends OrderReferenceType
{
    protected const ELEMENT_SIGNATURE = 'cac:OrderReference';
}
