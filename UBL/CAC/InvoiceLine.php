<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\InvoiceLineType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_InvoiceLine.html.
 */
final class InvoiceLine extends InvoiceLineType
{
    protected const ELEMENT_SIGNATURE = 'cac:InvoiceLine';
}
