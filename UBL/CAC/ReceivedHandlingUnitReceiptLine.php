<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ReceiptLineType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ReceivedHandlingUnitReceiptLine.html.
 */
final class ReceivedHandlingUnitReceiptLine extends ReceiptLineType
{
    protected const ELEMENT_SIGNATURE = 'cac:ReceivedHandlingUnitReceiptLine';
}
