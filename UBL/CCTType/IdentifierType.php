<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\AnyURI;
use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdString;
use i3or1s\UBL\Util\AttributeBuilder;

/**
 * http://www.datypic.com/sc/ubl21/t-cct_IdentifierType.html.
 */
abstract class IdentifierType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:IdentifierType';

    public readonly NormalizedString $value;

    public readonly ?NormalizedString $schemeID;         // [0..1]	xsd:normalizedString	The identification of the identification scheme.	from type cct:IdentifierType
    public readonly ?XsdString $schemeName;              // [0..1]	xsd:string	The name of the identification scheme.	from type cct:IdentifierType
    public readonly ?NormalizedString $schemeAgencyID;   // [0..1]	xsd:normalizedString	The identification of the agency that maintains the identification scheme.	from type cct:IdentifierType
    public readonly ?XsdString $schemeAgencyName;        // [0..1]	xsd:string	The name of the agency that maintains the identification scheme.	from type cct:IdentifierType
    public readonly ?NormalizedString $schemeVersionID;  // [0..1]	xsd:normalizedString	The version of the identification scheme.	from type cct:IdentifierType
    public readonly ?AnyURI $schemeDataURI;              // [0..1]	xsd:anyURI	The Uniform Resource Identifier that identifies where the identification scheme data is located.	from type cct:IdentifierType
    public readonly ?AnyURI $schemeURI;                  // [0..1]	xsd:anyURI	The Uniform Resource Identifier that identifies where the identification scheme is located.	from type cct:IdentifierType

    public function __construct(NormalizedString $value, ?NormalizedString $schemeID, ?XsdString $schemeName, ?NormalizedString $schemeAgencyID, ?XsdString $schemeAgencyName, ?NormalizedString $schemeVersionID, ?AnyURI $schemeDataURI, ?AnyURI $schemeURI)
    {
        $this->value = $value;
        $this->schemeID = $schemeID;
        $this->schemeName = $schemeName;
        $this->schemeAgencyID = $schemeAgencyID;
        $this->schemeAgencyName = $schemeAgencyName;
        $this->schemeVersionID = $schemeVersionID;
        $this->schemeDataURI = $schemeDataURI;
        $this->schemeURI = $schemeURI;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'schemeID', 'schemeName', 'schemeAgencyID', 'schemeAgencyName',
                    'schemeVersionID', 'schemeDataURI', 'schemeURI',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
