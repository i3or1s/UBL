<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ExternalReference;
use i3or1s\UBL\CBC\EmbeddedDocumentBinaryObject;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_AttachmentType.html.
 */
abstract class AttachmentType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:AttachmentType';

    public readonly ?EmbeddedDocumentBinaryObject $EmbeddedDocumentBinaryObject;    // [0..1]    A binary large object containing an attached document.
    public readonly ?ExternalReference $ExternalReference;  // [0..1]    A reference to an attached document that is external to the document(s) being exchanged.

    public function __construct(?EmbeddedDocumentBinaryObject $EmbeddedDocumentBinaryObject, ?ExternalReference $ExternalReference)
    {
        $this->EmbeddedDocumentBinaryObject = $EmbeddedDocumentBinaryObject;
        $this->ExternalReference = $ExternalReference;
    }

    public function __toString()
    {
        $response = [];
        if ($this->EmbeddedDocumentBinaryObject) {
            $response[] = (string) $this->EmbeddedDocumentBinaryObject;
        }
        if ($this->ExternalReference) {
            $response[] = (string) $this->ExternalReference;
        }

        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
