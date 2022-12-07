<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ContractType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ReferencedContract.html.
 */
final class ReferencedContract extends ContractType
{
    protected const ELEMENT_SIGNATURE = 'cac:ReferencedContract';
}
