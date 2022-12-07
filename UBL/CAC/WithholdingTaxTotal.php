<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TaxTotalType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_WithholdingTaxTotal.html.
 */
final class WithholdingTaxTotal extends TaxTotalType
{
    protected const ELEMENT_SIGNATURE = 'cac:WithholdingTaxTotal';
}
