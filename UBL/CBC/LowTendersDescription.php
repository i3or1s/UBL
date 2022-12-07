<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_LowTendersDescription.html.
 */
final class LowTendersDescription extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:LowTendersDescription';
}
