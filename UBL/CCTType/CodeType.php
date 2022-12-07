<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\AnyURI;
use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdLanguage;
use i3or1s\UBL\Util\AttributeBuilder;

abstract class CodeType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:CodeType';

    public readonly NormalizedString $value;

    public readonly ?NormalizedString $listID; //	[0..1]	xsd:normalizedString	The identification of a list of codes.
    public readonly ?NormalizedString $listAgencyID; //	[0..1]	xsd:normalizedString	An agency that maintains one or more lists of codes.
    public readonly ?string $listAgencyName; //	[0..1]	xsd:string	The name of the agency that maintains the list of codes.
    public readonly ?string $listName; //	[0..1]	xsd:string	The name of a list of codes.
    public readonly ?NormalizedString $listVersionID; //	[0..1]	xsd:normalizedString	The version of the list of codes.
    public readonly ?string $name; //	[0..1]	xsd:string	The textual equivalent of the code content component.
    public readonly ?XsdLanguage $languageID; //	[0..1]	xsd:language	The identifier of the language used in the code name.
    public readonly ?AnyURI $listURI; //	[0..1]	xsd:anyURI	The Uniform Resource Identifier that identifies where the code list is located.
    public readonly ?AnyURI $listSchemeURI; //	[0..1]	xsd:anyURI	The Uniform Resource Identifier that identifies where the code list scheme is located.

    public function __construct(NormalizedString $value, ?NormalizedString $listID, ?NormalizedString $listAgencyID, ?string $listAgencyName, ?string $listName, ?NormalizedString $listVersionID, ?string $name, ?XsdLanguage $languageID, ?AnyURI $listURI, ?AnyURI $listSchemeURI)
    {
        $this->value = $value;
        $this->listID = $listID;
        $this->listAgencyID = $listAgencyID;
        $this->listAgencyName = $listAgencyName;
        $this->listName = $listName;
        $this->listVersionID = $listVersionID;
        $this->name = $name;
        $this->languageID = $languageID;
        $this->listURI = $listURI;
        $this->listSchemeURI = $listSchemeURI;
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
