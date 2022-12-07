<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\CodeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_PositionCode.html.
 */
final class PositionCode extends CodeType
{
    protected const ELEMENT_SIGNATURE = 'cbc:PositionCode';
}
