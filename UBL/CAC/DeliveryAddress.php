<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AddressType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DeliveryAddress.html.
 */
final class DeliveryAddress extends AddressType
{
    protected const ELEMENT_SIGNATURE = 'cac:DeliveryAddress';
}
