<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_Password.html.
 */
final class Password extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:Password';
}
