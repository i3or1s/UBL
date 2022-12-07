<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ItemIdentificationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ManufacturersItemIdentification.html.
 */
final class ManufacturersItemIdentification extends ItemIdentificationType
{
    protected const ELEMENT_SIGNATURE = 'cac:ManufacturersItemIdentification';
}
