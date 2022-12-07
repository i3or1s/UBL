<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\IdentifierType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_SequenceNumberID.html.
 */
final class SequenceNumberID extends IdentifierType
{
    protected const ELEMENT_SIGNATURE = 'cbc:SequenceNumberID';
}
