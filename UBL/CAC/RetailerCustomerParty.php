<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CustomerPartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_RetailerCustomerParty.html.
 */
final class RetailerCustomerParty extends CustomerPartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:RetailerCustomerParty';
}
