<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\AnyURI;
use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdBase64Binary;
use i3or1s\UBL\Basic\XsdString;
use i3or1s\UBL\Util\AttributeBuilder;

abstract class BinaryObjectType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:BinaryObjectType';

    public readonly XsdBase64Binary $value;

    public readonly ?XsdString $format; //	[0..1]	xsd:string	The format of the binary content.
    public readonly ?NormalizedString $mimeCode; //	[0..1]	xsd:normalizedString	The mime type of the binary object.
    public readonly ?NormalizedString $encodingCode; //	[0..1]	xsd:normalizedString	Specifies the decoding algorithm of the binary object.
    public readonly ?NormalizedString $characterSetCode; //	[0..1]	xsd:normalizedString	The character set of the binary object if the mime type is text.
    public readonly ?AnyURI $uri; //	[0..1]	xsd:anyURI	The Uniform Resource Identifier that identifies where the binary object is located.
    public readonly ?XsdString $filename; //	[0..1]	xsd:string	The filename of the binary object.

    public function __construct(XsdBase64Binary $value, ?XsdString $format, ?NormalizedString $mimeCode, ?NormalizedString $encodingCode, ?NormalizedString $characterSetCode, ?AnyURI $uri, ?XsdString $filename)
    {
        $this->value = $value;
        $this->format = $format;
        $this->mimeCode = $mimeCode;
        $this->encodingCode = $encodingCode;
        $this->characterSetCode = $characterSetCode;
        $this->uri = $uri;
        $this->filename = $filename;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'listID', 'listAgencyID', 'listAgencyName', 'listName',
                    'listVersionID', 'name', 'languageID', 'listURI', 'listSchemeURI',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
