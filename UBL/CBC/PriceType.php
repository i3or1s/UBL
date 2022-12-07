<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_PriceType.html.
 */
final class PriceType extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:PriceType';
}
