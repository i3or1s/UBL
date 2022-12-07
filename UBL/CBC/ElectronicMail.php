<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ElectronicMail.html.
 */
final class ElectronicMail extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ElectronicMail';
}
