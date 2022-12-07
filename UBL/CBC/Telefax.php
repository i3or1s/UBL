<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_Telefax.html.
 */
final class Telefax extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:Telefax';
}
