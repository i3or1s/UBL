<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ExchangeRateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PaymentAlternativeExchangeRate.html.
 */
final class PaymentAlternativeExchangeRate extends ExchangeRateType
{
    protected const ELEMENT_SIGNATURE = 'cac:PaymentAlternativeExchangeRate';
}
