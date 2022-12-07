<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\AttributeID;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\DescriptionCode;
use i3or1s\UBL\CBC\PositionCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PhysicalAttribute.html.
 */
final class PhysicalAttribute implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PhysicalAttribute';

    public readonly AttributeID $AttributeID; // [1..1]    An identifier for this physical attribute.
    public readonly ?PositionCode $PositionCode; // [0..1]    A code signifying the position of this physical attribute.
    public readonly ?DescriptionCode $DescriptionCode; // [0..1]    A description of the physical attribute, expressed as a code.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    A description of the physical attribute, expressed as text.

    /**
     * @param Description[]|null $Description
     */
    public function __construct(AttributeID $AttributeID, ?PositionCode $PositionCode, ?DescriptionCode $DescriptionCode, ?array $Description)
    {
        $this->AttributeID = $AttributeID;
        $this->PositionCode = $PositionCode;
        $this->DescriptionCode = $DescriptionCode;
        $this->Description = $Description;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->AttributeID;
        if ($this->PositionCode) {
            $response[] = (string) $this->PositionCode;
        }
        if ($this->DescriptionCode) {
            $response[] = (string) $this->DescriptionCode;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
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
