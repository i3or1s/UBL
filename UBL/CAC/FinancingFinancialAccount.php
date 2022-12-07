<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\FinancialAccountType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FinancingFinancialAccount.html.
 */
final class FinancingFinancialAccount extends FinancialAccountType
{
    protected const ELEMENT_SIGNATURE = 'cac:FinancingFinancialAccount';
}
