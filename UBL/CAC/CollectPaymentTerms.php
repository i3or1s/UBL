<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PaymentTermsType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CollectPaymentTerms.html.
 */
final class CollectPaymentTerms extends PaymentTermsType
{
    protected const ELEMENT_SIGNATURE = 'cac:CollectPaymentTerms';
}
