<?php

namespace i3or1s\UBL\EXT;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-ext_ExtensionAgencyName.html.
 */
final class ExtensionAgencyName extends TextType
{
    protected const ELEMENT_SIGNATURE = 'ext:ExtensionAgencyName';
}
