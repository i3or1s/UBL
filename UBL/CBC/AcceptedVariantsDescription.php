<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_AcceptedVariantsDescription.html.
 */
final class AcceptedVariantsDescription extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:AcceptedVariantsDescription';
}
