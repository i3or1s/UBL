<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ContactType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AccountingContact.html.
 */
final class AccountingContact extends ContactType
{
    protected const ELEMENT_SIGNATURE = 'cac:AccountingContact';
}
