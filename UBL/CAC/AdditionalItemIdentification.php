<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ItemIdentificationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AdditionalItemIdentification.html.
 */
final class AdditionalItemIdentification extends ItemIdentificationType
{
    protected const ELEMENT_SIGNATURE = 'cac:AdditionalItemIdentification';
}
