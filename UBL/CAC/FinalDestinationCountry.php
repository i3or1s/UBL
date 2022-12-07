<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CountryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FinalDestinationCountry.html.
 */
final class FinalDestinationCountry extends CountryType
{
    protected const ELEMENT_SIGNATURE = 'cac:FinalDestinationCountry';
}
