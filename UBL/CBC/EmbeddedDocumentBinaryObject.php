<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\BinaryObjectType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_EmbeddedDocumentBinaryObject.html.
 */
final class EmbeddedDocumentBinaryObject extends BinaryObjectType
{
    protected const ELEMENT_SIGNATURE = 'cbc:EmbeddedDocumentBinaryObject';
}
