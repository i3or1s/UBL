<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CustomerPartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AccountingCustomerParty.html.
 */
final class AccountingCustomerParty extends CustomerPartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:AccountingCustomerParty';
}
