<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\FinancialAccountType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PayerFinancialAccount.html.
 */
final class PayerFinancialAccount extends FinancialAccountType
{
    protected const ELEMENT_SIGNATURE = 'cac:PayerFinancialAccount';
}
