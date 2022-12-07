<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\SupplierPartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AccountingSupplierParty.html.
 */
final class AccountingSupplierParty extends SupplierPartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:AccountingSupplierParty';
}
