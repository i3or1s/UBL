<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TaxTotalType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TaxTotal.html.
 */
final class TaxTotal extends TaxTotalType
{
    protected const ELEMENT_SIGNATURE = 'cac:TaxTotal';
}
