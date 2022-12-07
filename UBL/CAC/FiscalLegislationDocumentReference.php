<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DocumentReferenceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FiscalLegislationDocumentReference.html.
 */
final class FiscalLegislationDocumentReference extends DocumentReferenceType
{
    protected const ELEMENT_SIGNATURE = 'cac:FiscalLegislationDocumentReference';
}
