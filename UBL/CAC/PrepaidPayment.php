<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PaymentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PrepaidPayment.html.
 */
final class PrepaidPayment extends PaymentType
{
    protected const ELEMENT_SIGNATURE = 'cac:PrepaidPayment';
}
