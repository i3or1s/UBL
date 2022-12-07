<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_BarcodeSymbologyID.html.
 */
final class BarcodeSymbologyID extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'cbc:BarcodeSymbologyID';
}
