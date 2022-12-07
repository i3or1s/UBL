<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\LineReferenceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CatalogueLineReference.html.
 */
final class CatalogueLineReference extends LineReferenceType
{
    protected const ELEMENT_SIGNATURE = 'cac:CatalogueLineReference';
}
