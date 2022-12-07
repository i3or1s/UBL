<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CountryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_OriginalDepartureCountry.html.
 */
final class OriginalDepartureCountry extends CountryType
{
    protected const ELEMENT_SIGNATURE = 'cac:OriginalDepartureCountry';
}
