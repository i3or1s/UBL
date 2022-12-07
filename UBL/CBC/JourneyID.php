<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_JourneyID.html.
 */
final class JourneyID extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'cbc:JourneyID';
}
