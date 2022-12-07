<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DocumentReferenceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_IdentityDocumentReference.html.
 */
final class IdentityDocumentReference extends DocumentReferenceType
{
    protected const ELEMENT_SIGNATURE = 'cac:IdentityDocumentReference';
}
