<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ItemPropertyGroup;
use i3or1s\UBL\CAC\ItemPropertyRange;
use i3or1s\UBL\CAC\RangeDimension;
use i3or1s\UBL\CAC\UsabilityPeriod;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\ImportanceCode;
use i3or1s\UBL\CBC\ListValue;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\NameCode;
use i3or1s\UBL\CBC\TestMethod;
use i3or1s\UBL\CBC\Value;
use i3or1s\UBL\CBC\ValueQualifier;
use i3or1s\UBL\CBC\ValueQuantity;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ItemPropertyType.html.
 */
abstract class ItemPropertyType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ItemPropertyType';

    public readonly ?ID $ID; // [0..1]    An identifier for this property of an item.
    public readonly Name $Name; // [1..1]    The name of this item property.
    public readonly ?NameCode $NameCode; // [0..1]    The name of this item property, expressed as a code.
    public readonly ?TestMethod $TestMethod; // [0..1]    The method of testing the value of this item property.
    public readonly ?Value $Value; // [0..1]    The value of this item property, expressed as text.
    public readonly ?ValueQuantity $ValueQuantity; // [0..1]    The value of this item property, expressed as a quantity.
    /** @var ValueQualifier[]|null */
    public readonly ?array $ValueQualifier; // [0..*]    Text qualifying the value of the property.
    public readonly ?ImportanceCode $ImportanceCode; // [0..1]    A code signifying the importance of this property in using it to describe a related Item.
    /** @var ListValue[]|null */
    public readonly ?array $ListValue; // [0..*]    The value expressed as a text in case the property is a value in a list. For example, a colour.
    public readonly ?UsabilityPeriod $UsabilityPeriod; // [0..1]    The period during which this item property is valid.
    /** @var ItemPropertyGroup[]|null */
    public readonly ?array $ItemPropertyGroup; // [0..*]    A description of the property group to which this item property belongs.
    public readonly ?RangeDimension $RangeDimension; // [0..1]    The range of values for the dimensions of this property.
    public readonly ?ItemPropertyRange $ItemPropertyRange; // [0..1]    A range of values for this item property.

    /**
     * @param ValueQualifier[]|null    $ValueQualifier
     * @param ListValue[]|null         $ListValue
     * @param ItemPropertyGroup[]|null $ItemPropertyGroup
     */
    public function __construct(?ID $ID, Name $Name, ?NameCode $NameCode, ?TestMethod $TestMethod, ?Value $Value, ?ValueQuantity $ValueQuantity, ?array $ValueQualifier, ?ImportanceCode $ImportanceCode, ?array $ListValue, ?UsabilityPeriod $UsabilityPeriod, ?array $ItemPropertyGroup, ?RangeDimension $RangeDimension, ?ItemPropertyRange $ItemPropertyRange)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->NameCode = $NameCode;
        $this->TestMethod = $TestMethod;
        $this->Value = $Value;
        $this->ValueQuantity = $ValueQuantity;
        $this->ValueQualifier = $ValueQualifier;
        $this->ImportanceCode = $ImportanceCode;
        $this->ListValue = $ListValue;
        $this->UsabilityPeriod = $UsabilityPeriod;
        $this->ItemPropertyGroup = $ItemPropertyGroup;
        $this->RangeDimension = $RangeDimension;
        $this->ItemPropertyRange = $ItemPropertyRange;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        $response[] = (string) $this->Name;
        if ($this->NameCode) {
            $response[] = (string) $this->NameCode;
        }
        if ($this->TestMethod) {
            $response[] = (string) $this->TestMethod;
        }
        if ($this->Value) {
            $response[] = (string) $this->Value;
        }
        if ($this->ValueQuantity) {
            $response[] = (string) $this->ValueQuantity;
        }
        if ($this->ValueQualifier) {
            foreach ($this->ValueQualifier as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ImportanceCode) {
            $response[] = (string) $this->ImportanceCode;
        }
        if ($this->ListValue) {
            foreach ($this->ListValue as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->UsabilityPeriod) {
            $response[] = (string) $this->UsabilityPeriod;
        }
        if ($this->ItemPropertyGroup) {
            foreach ($this->ItemPropertyGroup as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->RangeDimension) {
            $response[] = (string) $this->RangeDimension;
        }
        if ($this->ItemPropertyRange) {
            $response[] = (string) $this->ItemPropertyRange;
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
