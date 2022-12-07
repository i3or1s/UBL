<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DocumentReferenceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_WorkOrderDocumentReference.html.
 */
final class WorkOrderDocumentReference extends DocumentReferenceType
{
    protected const ELEMENT_SIGNATURE = 'cac:WorkOrderDocumentReference';
}
