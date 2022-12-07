<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_RequiredCustomsID.html.
 */
final class RequiredCustomsID extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'cbc:RequiredCustomsID';
}
