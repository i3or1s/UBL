<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ExchangeRateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ExchangeRate.html.
 */
final class ExchangeRate extends ExchangeRateType
{
    protected const ELEMENT_SIGNATURE = 'cac:ExchangeRate';
}
