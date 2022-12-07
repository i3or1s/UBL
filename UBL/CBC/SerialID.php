<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_SerialID.html.
 */
final class SerialID extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'cbc:SerialID';
}
