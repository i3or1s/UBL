<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ReceiptLineType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ReceiptLine.html.
 */
final class ReceiptLine extends ReceiptLineType
{
    protected const ELEMENT_SIGNATURE = 'cac:ReceiptLine';
}
