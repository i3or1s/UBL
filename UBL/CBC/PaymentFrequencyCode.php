<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\CodeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_PaymentFrequencyCode.html.
 */
final class PaymentFrequencyCode extends CodeType
{
    protected const ELEMENT_SIGNATURE = 'cbc:PaymentFrequencyCode';
}
