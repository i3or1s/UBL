<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\IssuerParty;
use i3or1s\UBL\CAC\MeasurementDimension;
use i3or1s\UBL\CAC\PhysicalAttribute;
use i3or1s\UBL\CBC\BarcodeSymbologyID;
use i3or1s\UBL\CBC\ExtendedID;
use i3or1s\UBL\CBC\ID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ItemIdentificationType.html.
 */
abstract class ItemIdentificationType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ItemIdentificationType';

    public readonly ID $ID; // [1..1]    An identifier for the item.
    public readonly ?ExtendedID $ExtendedID; // [0..1]    An extended identifier for the item that identifies the item with specific properties, e.g., Item 123 = Chair / Item 123 Ext 45 = brown chair. Two chairs can have the same item number, but one is brown. The other is white.
    public readonly ?BarcodeSymbologyID $BarcodeSymbologyID; // [0..1]    An identifier for a system of barcodes.
    /** @var PhysicalAttribute[]|null */
    public readonly ?array $PhysicalAttribute; // [0..*]    A physical attribute of the item.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of the item.
    public readonly ?IssuerParty $IssuerParty; // [0..1]    The party that issued this item identification.

    /**
     * @param PhysicalAttribute[]|null    $PhysicalAttribute
     * @param MeasurementDimension[]|null $MeasurementDimension
     */
    public function __construct(ID $ID, ?ExtendedID $ExtendedID, ?BarcodeSymbologyID $BarcodeSymbologyID, ?array $PhysicalAttribute, ?array $MeasurementDimension, ?IssuerParty $IssuerParty)
    {
        $this->ID = $ID;
        $this->ExtendedID = $ExtendedID;
        $this->BarcodeSymbologyID = $BarcodeSymbologyID;
        $this->PhysicalAttribute = $PhysicalAttribute;
        $this->MeasurementDimension = $MeasurementDimension;
        $this->IssuerParty = $IssuerParty;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->ExtendedID) {
            $response[] = (string) $this->ExtendedID;
        }
        if ($this->BarcodeSymbologyID) {
            $response[] = (string) $this->BarcodeSymbologyID;
        }
        if ($this->PhysicalAttribute) {
            foreach ($this->PhysicalAttribute as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->IssuerParty) {
            $response[] = (string) $this->IssuerParty;
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
