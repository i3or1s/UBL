<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_Extension.html.
 */
final class Extension extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:Extension';
}
