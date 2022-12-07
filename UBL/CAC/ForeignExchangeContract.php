<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ContractType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ForeignExchangeContract.html.
 */
final class ForeignExchangeContract extends ContractType
{
    protected const ELEMENT_SIGNATURE = 'cac:ForeignExchangeContract';
}
