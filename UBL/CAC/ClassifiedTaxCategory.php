<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TaxCategoryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ClassifiedTaxCategory.html.
 */
final class ClassifiedTaxCategory extends TaxCategoryType
{
    protected const ELEMENT_SIGNATURE = 'cac:ClassifiedTaxCategory';
}
