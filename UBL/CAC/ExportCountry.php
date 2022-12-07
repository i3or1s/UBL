<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CountryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ExportCountry.html.
 */
final class ExportCountry extends CountryType
{
    protected const ELEMENT_SIGNATURE = 'cac:ExportCountry';
}
