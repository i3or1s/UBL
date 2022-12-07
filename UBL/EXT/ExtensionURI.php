<?php

namespace i3or1s\UBL\EXT;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-ext_ExtensionURI.html.
 */
final class ExtensionURI extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'ext:ExtensionURI';
}
