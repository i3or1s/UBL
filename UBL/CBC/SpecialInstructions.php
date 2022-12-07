<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_SpecialInstructions.html.
 */
final class SpecialInstructions extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:SpecialInstructions';
}
