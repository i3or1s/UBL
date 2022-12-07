<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PaymentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Payment.html.
 */
final class Payment extends PaymentType
{
    protected const ELEMENT_SIGNATURE = 'cac:Payment';
}
