<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ContainedPackage;
use i3or1s\UBL\CAC\ContainingTransportEquipment;
use i3or1s\UBL\CAC\Delivery;
use i3or1s\UBL\CAC\DeliveryUnit;
use i3or1s\UBL\CAC\Despatch;
use i3or1s\UBL\CAC\GoodsItem;
use i3or1s\UBL\CAC\MeasurementDimension;
use i3or1s\UBL\CAC\Pickup;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\PackageLevelCode;
use i3or1s\UBL\CBC\PackagingTypeCode;
use i3or1s\UBL\CBC\PackingMaterial;
use i3or1s\UBL\CBC\Quantity;
use i3or1s\UBL\CBC\ReturnableMaterialIndicator;
use i3or1s\UBL\CBC\TraceID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PackageType.html.
 */
abstract class PackageType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PackageType';

    public readonly ?ID $ID; // [0..1]    An identifier for this package.
    public readonly ?Quantity $Quantity; // [0..1]    The quantity of items contained in this package.
    public readonly ?ReturnableMaterialIndicator $ReturnableMaterialIndicator; // [0..1]    An indicator that the packaging material is returnable (true) or not (false).
    public readonly ?PackageLevelCode $PackageLevelCode; // [0..1]    A code signifying a level of packaging.
    public readonly ?PackagingTypeCode $PackagingTypeCode; // [0..1]    A code signifying a type of packaging.
    /** @var PackingMaterial[]|null */
    public readonly ?array $PackingMaterial; // [0..*]    Text describing the packaging material.
    public readonly ?TraceID $TraceID; // [0..1]    An identifier for use in tracing this package, such as the EPC number used in RFID.
    /** @var ContainedPackage[]|null */
    public readonly ?array $ContainedPackage; // [0..*]    A package contained within this package.
    public readonly ?ContainingTransportEquipment $ContainingTransportEquipment; // [0..1]    The piece of transport equipment containing this package.
    /** @var GoodsItem[]|null */
    public readonly ?array $GoodsItem; // [0..*]    A goods item included in this package.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of this package.
    /** @var DeliveryUnit[]|null */
    public readonly ?array $DeliveryUnit; // [0..*]    A delivery unit within this package.
    public readonly ?Delivery $Delivery; // [0..1]    The delivery of this package.
    public readonly ?Pickup $Pickup; // [0..1]    The pickup of this package.
    public readonly ?Despatch $Despatch; // [0..1]    The despatch of this package.

    /**
     * @param PackingMaterial[]|null      $PackingMaterial
     * @param ContainedPackage[]|null     $ContainedPackage
     * @param GoodsItem[]|null            $GoodsItem
     * @param MeasurementDimension[]|null $MeasurementDimension
     * @param DeliveryUnit[]|null         $DeliveryUnit
     */
    public function __construct(?ID $ID, ?Quantity $Quantity, ?ReturnableMaterialIndicator $ReturnableMaterialIndicator, ?PackageLevelCode $PackageLevelCode, ?PackagingTypeCode $PackagingTypeCode, ?array $PackingMaterial, ?TraceID $TraceID, ?array $ContainedPackage, ?ContainingTransportEquipment $ContainingTransportEquipment, ?array $GoodsItem, ?array $MeasurementDimension, ?array $DeliveryUnit, ?Delivery $Delivery, ?Pickup $Pickup, ?Despatch $Despatch)
    {
        $this->ID = $ID;
        $this->Quantity = $Quantity;
        $this->ReturnableMaterialIndicator = $ReturnableMaterialIndicator;
        $this->PackageLevelCode = $PackageLevelCode;
        $this->PackagingTypeCode = $PackagingTypeCode;
        $this->PackingMaterial = $PackingMaterial;
        $this->TraceID = $TraceID;
        $this->ContainedPackage = $ContainedPackage;
        $this->ContainingTransportEquipment = $ContainingTransportEquipment;
        $this->GoodsItem = $GoodsItem;
        $this->MeasurementDimension = $MeasurementDimension;
        $this->DeliveryUnit = $DeliveryUnit;
        $this->Delivery = $Delivery;
        $this->Pickup = $Pickup;
        $this->Despatch = $Despatch;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Quantity) {
            $response[] = (string) $this->Quantity;
        }
        if ($this->ReturnableMaterialIndicator) {
            $response[] = (string) $this->ReturnableMaterialIndicator;
        }
        if ($this->PackageLevelCode) {
            $response[] = (string) $this->PackageLevelCode;
        }
        if ($this->PackagingTypeCode) {
            $response[] = (string) $this->PackagingTypeCode;
        }
        if ($this->PackingMaterial) {
            foreach ($this->PackingMaterial as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TraceID) {
            $response[] = (string) $this->TraceID;
        }
        if ($this->ContainedPackage) {
            foreach ($this->ContainedPackage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ContainingTransportEquipment) {
            $response[] = (string) $this->ContainingTransportEquipment;
        }
        if ($this->GoodsItem) {
            foreach ($this->GoodsItem as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DeliveryUnit) {
            foreach ($this->DeliveryUnit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Delivery) {
            $response[] = (string) $this->Delivery;
        }
        if ($this->Pickup) {
            $response[] = (string) $this->Pickup;
        }
        if ($this->Despatch) {
            $response[] = (string) $this->Despatch;
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
