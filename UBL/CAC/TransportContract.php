<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ContractType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TransportContract.html.
 */
final class TransportContract extends ContractType
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportContract';
}
