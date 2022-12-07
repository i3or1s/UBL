<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AddressType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PostalAddress.html.
 */
final class PostalAddress extends AddressType
{
    protected const ELEMENT_SIGNATURE = 'cac:PostalAddress';
}
