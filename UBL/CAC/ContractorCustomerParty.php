<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CustomerPartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ContractorCustomerParty.html.
 */
final class ContractorCustomerParty extends CustomerPartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:ContractorCustomerParty';
}
