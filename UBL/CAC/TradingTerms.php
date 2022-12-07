<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TradingTermsType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TradingTerms.html.
 */
final class TradingTerms extends TradingTermsType
{
    protected const ELEMENT_SIGNATURE = 'cac:TradingTerms';
}
