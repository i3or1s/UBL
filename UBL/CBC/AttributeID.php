<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_AttributeID.html.
 */
final class AttributeID extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'cbc:AttributeID';
}
