<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PaymentTermsType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PaymentTerms.html.
 */
final class PaymentTerms extends PaymentTermsType
{
    protected const ELEMENT_SIGNATURE = 'cac:PaymentTerms';
}
