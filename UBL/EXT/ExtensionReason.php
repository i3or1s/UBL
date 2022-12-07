<?php

namespace i3or1s\UBL\EXT;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-ext_ExtensionReason.html.
 */
final class ExtensionReason extends TextType
{
    protected const ELEMENT_SIGNATURE = 'ext:ExtensionReason';
}
