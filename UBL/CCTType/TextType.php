<?php

namespace i3or1s\UBL\CCTType;

use i3or1s\UBL\Basic\NormalizedString;
use i3or1s\UBL\Basic\XsdLanguage;
use i3or1s\UBL\Util\AttributeBuilder;

/**
 * http://www.datypic.com/sc/ubl21/t-cct_TextType.html.
 */
abstract class TextType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cct:TextType';

    public readonly string $value;

    public readonly ?XsdLanguage $languageID;  //	[0..1]	xsd:language	The identifier of the language used in the content component.	from type cct:TextType
    public readonly ?NormalizedString $languageLocaleID;    //	[0..1]	xsd:normalizedString	The identification of the locale of the language.	from type cct:TextType

    public function __construct(string $value, ?XsdLanguage $languageID, ?NormalizedString $languageLocaleID)
    {
        $this->value = $value;
        $this->languageID = $languageID;
        $this->languageLocaleID = $languageLocaleID;
    }

    public function __toString()
    {
        return sprintf(
            '<%s %s>%s</%s>',
            $this::ELEMENT_SIGNATURE,
            AttributeBuilder::build(
                $this,
                [
                    'languageID', 'languageLocaleID',
                ]
            ),
            $this->value,
            $this::ELEMENT_SIGNATURE
        );
    }
}
