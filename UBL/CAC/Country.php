<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CountryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Country.html.
 */
final class Country extends CountryType
{
    protected const ELEMENT_SIGNATURE = 'cac:Country';
}
