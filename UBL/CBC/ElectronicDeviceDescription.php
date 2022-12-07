<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\TextType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ElectronicDeviceDescription.html.
 */
final class ElectronicDeviceDescription extends TextType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ElectronicDeviceDescription';
}
