<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ActualPackage;
use i3or1s\UBL\CAC\CustomsDeclaration;
use i3or1s\UBL\CAC\FloorSpaceMeasurementDimension;
use i3or1s\UBL\CAC\GoodsItem;
use i3or1s\UBL\CAC\HandlingUnitDespatchLine;
use i3or1s\UBL\CAC\HazardousGoodsTransit;
use i3or1s\UBL\CAC\MaximumTemperature;
use i3or1s\UBL\CAC\MeasurementDimension;
use i3or1s\UBL\CAC\MinimumTemperature;
use i3or1s\UBL\CAC\Package;
use i3or1s\UBL\CAC\PalletSpaceMeasurementDimension;
use i3or1s\UBL\CAC\ReceivedHandlingUnitReceiptLine;
use i3or1s\UBL\CAC\ReferencedShipment;
use i3or1s\UBL\CAC\ShipmentDocumentReference;
use i3or1s\UBL\CAC\Status;
use i3or1s\UBL\CAC\TransportEquipment;
use i3or1s\UBL\CAC\TransportMeans;
use i3or1s\UBL\CBC\DamageRemarks;
use i3or1s\UBL\CBC\HandlingCode;
use i3or1s\UBL\CBC\HandlingInstructions;
use i3or1s\UBL\CBC\HazardousRiskIndicator;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\ShippingMarks;
use i3or1s\UBL\CBC\TotalGoodsItemQuantity;
use i3or1s\UBL\CBC\TotalPackageQuantity;
use i3or1s\UBL\CBC\TraceID;
use i3or1s\UBL\CBC\TransportHandlingUnitTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TransportHandlingUnitType.html.
 */
abstract class TransportHandlingUnitType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportHandlingUnitType';

    public readonly ?ID $ID; // [0..1]    An identifier for this transport handling unit.
    public readonly ?TransportHandlingUnitTypeCode $TransportHandlingUnitTypeCode; // [0..1]    A code signifying the type of this transport handling unit.
    public readonly ?HandlingCode $HandlingCode; // [0..1]    The handling required for this transport handling unit, expressed as a code.
    /** @var HandlingInstructions[]|null */
    public readonly ?array $HandlingInstructions; // [0..*]    The handling required for this transport handling unit, expressed as text.
    public readonly ?HazardousRiskIndicator $HazardousRiskIndicator; // [0..1]    An indicator that the materials contained in this transport handling unit are subject to an international regulation concerning the carriage of dangerous goods (true) or not (false).
    public readonly ?TotalGoodsItemQuantity $TotalGoodsItemQuantity; // [0..1]    The total number of goods items in this transport handling unit.
    public readonly ?TotalPackageQuantity $TotalPackageQuantity; // [0..1]    The total number of packages in this transport handling unit.
    /** @var DamageRemarks[]|null */
    public readonly ?array $DamageRemarks; // [0..*]    Text describing damage associated with this transport handling unit.
    /** @var ShippingMarks[]|null */
    public readonly ?array $ShippingMarks; // [0..*]    Text describing the marks and numbers on this transport handling unit.
    public readonly ?TraceID $TraceID; // [0..1]    An identifier for use in tracing this transport handling unit, such as the EPC number used in RFID.
    /** @var HandlingUnitDespatchLine[]|null */
    public readonly ?array $HandlingUnitDespatchLine; // [0..*]    A despatch line associated with this transport handling unit.
    /** @var ActualPackage[]|null */
    public readonly ?array $ActualPackage; // [0..*]    A package contained in this transport handling unit.
    /** @var ReceivedHandlingUnitReceiptLine[]|null */
    public readonly ?array $ReceivedHandlingUnitReceiptLine; // [0..*]    A receipt line associated with this transport handling unit.
    /** @var TransportEquipment[]|null */
    public readonly ?array $TransportEquipment; // [0..*]    A piece of transport equipment associated with this transport handling unit.
    /** @var TransportMeans[]|null */
    public readonly ?array $TransportMeans; // [0..*]    A means of transport associated with this transport handling unit.
    /** @var HazardousGoodsTransit[]|null */
    public readonly ?array $HazardousGoodsTransit; // [0..*]    Transit-related information regarding a type of hazardous goods contained in this transport handling unit.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of this transport handling unit.
    public readonly ?MinimumTemperature $MinimumTemperature; // [0..1]    The minimum required operating temperature of this transport handling unit.
    public readonly ?MaximumTemperature $MaximumTemperature; // [0..1]    The maximum allowable operating temperature of this transport handling unit.
    /** @var GoodsItem[]|null */
    public readonly ?array $GoodsItem; // [0..*]    A goods item contained in this transport handling unit.
    public readonly ?FloorSpaceMeasurementDimension $FloorSpaceMeasurementDimension; // [0..1]    The floor space measurement dimension associated with this transport handling unit.
    public readonly ?PalletSpaceMeasurementDimension $PalletSpaceMeasurementDimension; // [0..1]    The pallet space measurement dimension associated to this transport handling unit.
    /** @var ShipmentDocumentReference[]|null */
    public readonly ?array $ShipmentDocumentReference; // [0..*]    A reference to a shipping document associated with this transport handling unit.
    /** @var Status[]|null */
    public readonly ?array $Status; // [0..*]    The status of this transport handling unit.
    /** @var CustomsDeclaration[]|null */
    public readonly ?array $CustomsDeclaration; // [0..*]    Describes identifiers or references relating to customs procedures.
    /** @var ReferencedShipment[]|null */
    public readonly ?array $ReferencedShipment; // [0..*]    A shipment associated with this transport handling unit.
    /** @var Package[]|null */
    public readonly ?array $Package; // [0..*]    A package contained in this transport handling unit.

    /**
     * @param HandlingInstructions[]|null            $HandlingInstructions
     * @param DamageRemarks[]|null                   $DamageRemarks
     * @param ShippingMarks[]|null                   $ShippingMarks
     * @param HandlingUnitDespatchLine[]|null        $HandlingUnitDespatchLine
     * @param ActualPackage[]|null                   $ActualPackage
     * @param ReceivedHandlingUnitReceiptLine[]|null $ReceivedHandlingUnitReceiptLine
     * @param TransportEquipment[]|null              $TransportEquipment
     * @param TransportMeans[]|null                  $TransportMeans
     * @param HazardousGoodsTransit[]|null           $HazardousGoodsTransit
     * @param MeasurementDimension[]|null            $MeasurementDimension
     * @param GoodsItem[]|null                       $GoodsItem
     * @param ShipmentDocumentReference[]|null       $ShipmentDocumentReference
     * @param Status[]|null                          $Status
     * @param CustomsDeclaration[]|null              $CustomsDeclaration
     * @param ReferencedShipment[]|null              $ReferencedShipment
     * @param Package[]|null                         $Package
     */
    public function __construct(?ID $ID, ?TransportHandlingUnitTypeCode $TransportHandlingUnitTypeCode, ?HandlingCode $HandlingCode, ?array $HandlingInstructions, ?HazardousRiskIndicator $HazardousRiskIndicator, ?TotalGoodsItemQuantity $TotalGoodsItemQuantity, ?TotalPackageQuantity $TotalPackageQuantity, ?array $DamageRemarks, ?array $ShippingMarks, ?TraceID $TraceID, ?array $HandlingUnitDespatchLine, ?array $ActualPackage, ?array $ReceivedHandlingUnitReceiptLine, ?array $TransportEquipment, ?array $TransportMeans, ?array $HazardousGoodsTransit, ?array $MeasurementDimension, ?MinimumTemperature $MinimumTemperature, ?MaximumTemperature $MaximumTemperature, ?array $GoodsItem, ?FloorSpaceMeasurementDimension $FloorSpaceMeasurementDimension, ?PalletSpaceMeasurementDimension $PalletSpaceMeasurementDimension, ?array $ShipmentDocumentReference, ?array $Status, ?array $CustomsDeclaration, ?array $ReferencedShipment, ?array $Package)
    {
        $this->ID = $ID;
        $this->TransportHandlingUnitTypeCode = $TransportHandlingUnitTypeCode;
        $this->HandlingCode = $HandlingCode;
        $this->HandlingInstructions = $HandlingInstructions;
        $this->HazardousRiskIndicator = $HazardousRiskIndicator;
        $this->TotalGoodsItemQuantity = $TotalGoodsItemQuantity;
        $this->TotalPackageQuantity = $TotalPackageQuantity;
        $this->DamageRemarks = $DamageRemarks;
        $this->ShippingMarks = $ShippingMarks;
        $this->TraceID = $TraceID;
        $this->HandlingUnitDespatchLine = $HandlingUnitDespatchLine;
        $this->ActualPackage = $ActualPackage;
        $this->ReceivedHandlingUnitReceiptLine = $ReceivedHandlingUnitReceiptLine;
        $this->TransportEquipment = $TransportEquipment;
        $this->TransportMeans = $TransportMeans;
        $this->HazardousGoodsTransit = $HazardousGoodsTransit;
        $this->MeasurementDimension = $MeasurementDimension;
        $this->MinimumTemperature = $MinimumTemperature;
        $this->MaximumTemperature = $MaximumTemperature;
        $this->GoodsItem = $GoodsItem;
        $this->FloorSpaceMeasurementDimension = $FloorSpaceMeasurementDimension;
        $this->PalletSpaceMeasurementDimension = $PalletSpaceMeasurementDimension;
        $this->ShipmentDocumentReference = $ShipmentDocumentReference;
        $this->Status = $Status;
        $this->CustomsDeclaration = $CustomsDeclaration;
        $this->ReferencedShipment = $ReferencedShipment;
        $this->Package = $Package;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->TransportHandlingUnitTypeCode) {
            $response[] = (string) $this->TransportHandlingUnitTypeCode;
        }
        if ($this->HandlingCode) {
            $response[] = (string) $this->HandlingCode;
        }
        if ($this->HandlingInstructions) {
            foreach ($this->HandlingInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousRiskIndicator) {
            $response[] = (string) $this->HazardousRiskIndicator;
        }
        if ($this->TotalGoodsItemQuantity) {
            $response[] = (string) $this->TotalGoodsItemQuantity;
        }
        if ($this->TotalPackageQuantity) {
            $response[] = (string) $this->TotalPackageQuantity;
        }
        if ($this->DamageRemarks) {
            foreach ($this->DamageRemarks as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ShippingMarks) {
            foreach ($this->ShippingMarks as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TraceID) {
            $response[] = (string) $this->TraceID;
        }
        if ($this->HandlingUnitDespatchLine) {
            foreach ($this->HandlingUnitDespatchLine as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ActualPackage) {
            foreach ($this->ActualPackage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReceivedHandlingUnitReceiptLine) {
            foreach ($this->ReceivedHandlingUnitReceiptLine as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportEquipment) {
            foreach ($this->TransportEquipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportMeans) {
            foreach ($this->TransportMeans as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousGoodsTransit) {
            foreach ($this->HazardousGoodsTransit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MinimumTemperature) {
            $response[] = (string) $this->MinimumTemperature;
        }
        if ($this->MaximumTemperature) {
            $response[] = (string) $this->MaximumTemperature;
        }
        if ($this->GoodsItem) {
            foreach ($this->GoodsItem as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FloorSpaceMeasurementDimension) {
            $response[] = (string) $this->FloorSpaceMeasurementDimension;
        }
        if ($this->PalletSpaceMeasurementDimension) {
            $response[] = (string) $this->PalletSpaceMeasurementDimension;
        }
        if ($this->ShipmentDocumentReference) {
            foreach ($this->ShipmentDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Status) {
            foreach ($this->Status as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CustomsDeclaration) {
            foreach ($this->CustomsDeclaration as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReferencedShipment) {
            foreach ($this->ReferencedShipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Package) {
            foreach ($this->Package as $elem) {
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
