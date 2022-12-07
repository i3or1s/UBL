<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AttachmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DigitalSignatureAttachment.html.
 */
final class DigitalSignatureAttachment extends AttachmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:DigitalSignatureAttachment';
}
