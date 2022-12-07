<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ExchangeRateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TaxExchangeRate.html.
 */
final class TaxExchangeRate extends ExchangeRateType
{
    protected const ELEMENT_SIGNATURE = 'cac:TaxExchangeRate';
}
