<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AddressType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_LocationAddress.html.
 */
final class LocationAddress extends AddressType
{
    protected const ELEMENT_SIGNATURE = 'cac:LocationAddress';
}
