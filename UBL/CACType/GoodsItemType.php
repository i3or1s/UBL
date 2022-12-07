<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ContainedGoodsItem;
use i3or1s\UBL\CAC\ContainingPackage;
use i3or1s\UBL\CAC\Delivery;
use i3or1s\UBL\CAC\Despatch;
use i3or1s\UBL\CAC\FreightAllowanceCharge;
use i3or1s\UBL\CAC\GoodsItemContainer;
use i3or1s\UBL\CAC\InvoiceLine;
use i3or1s\UBL\CAC\Item;
use i3or1s\UBL\CAC\MaximumTemperature;
use i3or1s\UBL\CAC\MeasurementDimension;
use i3or1s\UBL\CAC\MinimumTemperature;
use i3or1s\UBL\CAC\OriginAddress;
use i3or1s\UBL\CAC\Pickup;
use i3or1s\UBL\CAC\ShipmentDocumentReference;
use i3or1s\UBL\CAC\Temperature;
use i3or1s\UBL\CBC\ChargeableQuantity;
use i3or1s\UBL\CBC\ChargeableWeightMeasure;
use i3or1s\UBL\CBC\CustomsImportClassifiedIndicator;
use i3or1s\UBL\CBC\CustomsStatusCode;
use i3or1s\UBL\CBC\CustomsTariffQuantity;
use i3or1s\UBL\CBC\DeclaredCustomsValueAmount;
use i3or1s\UBL\CBC\DeclaredForCarriageValueAmount;
use i3or1s\UBL\CBC\DeclaredStatisticsValueAmount;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\FreeOnBoardValueAmount;
use i3or1s\UBL\CBC\GrossVolumeMeasure;
use i3or1s\UBL\CBC\GrossWeightMeasure;
use i3or1s\UBL\CBC\HazardousRiskIndicator;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InsuranceValueAmount;
use i3or1s\UBL\CBC\NetNetWeightMeasure;
use i3or1s\UBL\CBC\NetVolumeMeasure;
use i3or1s\UBL\CBC\NetWeightMeasure;
use i3or1s\UBL\CBC\PreferenceCriterionCode;
use i3or1s\UBL\CBC\Quantity;
use i3or1s\UBL\CBC\RequiredCustomsID;
use i3or1s\UBL\CBC\ReturnableQuantity;
use i3or1s\UBL\CBC\SequenceNumberID;
use i3or1s\UBL\CBC\TraceID;
use i3or1s\UBL\CBC\ValueAmount;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_GoodsItemType.html.
 */
abstract class GoodsItemType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:GoodsItemType';

    public readonly ?ID $ID; // [0..1]    An identifier for this goods item.
    public readonly ?SequenceNumberID $SequenceNumberID; // [0..1]    A sequence number differentiating a specific goods item within a consignment.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this goods item to identify it for customs, statistical, or transport purposes.
    public readonly ?HazardousRiskIndicator $HazardousRiskIndicator; // [0..1]    An indication that the transported goods item is subject to an international regulation concerning the carriage of dangerous goods (true) or not (false).
    public readonly ?DeclaredCustomsValueAmount $DeclaredCustomsValueAmount; // [0..1]    The total declared value for customs purposes of the goods item.
    public readonly ?DeclaredForCarriageValueAmount $DeclaredForCarriageValueAmount; // [0..1]    The value of this goods item, declared by the shipper or his agent solely for the purpose of varying the carrier's level of liability from that provided in the contract of carriage, in case of loss or damage to goods or delayed delivery.
    public readonly ?DeclaredStatisticsValueAmount $DeclaredStatisticsValueAmount; // [0..1]    The total declared value of all the goods items in the same consignment with this goods item that have the same statistical heading.
    public readonly ?FreeOnBoardValueAmount $FreeOnBoardValueAmount; // [0..1]    The monetary amount that has to be or has been paid as calculated under the applicable trade delivery.
    public readonly ?InsuranceValueAmount $InsuranceValueAmount; // [0..1]    The amount covered by insurance for this goods item.
    public readonly ?ValueAmount $ValueAmount; // [0..1]    The amount on which a duty, tax, or fee will be assessed.
    public readonly ?GrossWeightMeasure $GrossWeightMeasure; // [0..1]    The weight of this goods item, including packing and packaging but excluding the carrier's equipment.
    public readonly ?NetWeightMeasure $NetWeightMeasure; // [0..1]    The weight of this goods item, excluding packing but including packaging that normally accompanies the goods.
    public readonly ?NetNetWeightMeasure $NetNetWeightMeasure; // [0..1]    The total weight of this goods item, excluding all packing and packaging.
    public readonly ?ChargeableWeightMeasure $ChargeableWeightMeasure; // [0..1]    The weight on which a charge is to be based.
    public readonly ?GrossVolumeMeasure $GrossVolumeMeasure; // [0..1]    The volume of this goods item, normally calculated by multiplying its maximum length, width, and height.
    public readonly ?NetVolumeMeasure $NetVolumeMeasure; // [0..1]    The volume contained by a goods item, excluding the volume of any packaging material.
    public readonly ?Quantity $Quantity; // [0..1]    The number of units making up this goods item.
    public readonly ?PreferenceCriterionCode $PreferenceCriterionCode; // [0..1]    A code signifying the treatment preference for this goods item according to international trading agreements.
    public readonly ?RequiredCustomsID $RequiredCustomsID; // [0..1]    An identifier for a set of tariff codes required to specify a type of goods for customs, transport, statistical, or other regulatory purposes.
    public readonly ?CustomsStatusCode $CustomsStatusCode; // [0..1]    A code assigned by customs to signify the status of this goods item.
    public readonly ?CustomsTariffQuantity $CustomsTariffQuantity; // [0..1]    Quantity of the units in this goods item as required by customs for tariff, statistical, or fiscal purposes.
    public readonly ?CustomsImportClassifiedIndicator $CustomsImportClassifiedIndicator; // [0..1]    An indicator that this goods item has been classified for import by customs (true) or not (false).
    public readonly ?ChargeableQuantity $ChargeableQuantity; // [0..1]    The number of units in the goods item to which charges apply.
    public readonly ?ReturnableQuantity $ReturnableQuantity; // [0..1]    The number of units in the goods item that may be returned.
    public readonly ?TraceID $TraceID; // [0..1]    An identifier for use in tracing this goods item, such as the EPC number used in RFID.
    /** @var Item[]|null */
    public readonly ?array $Item; // [0..*]    Product information relating to a goods item.
    /** @var GoodsItemContainer[]|null */
    public readonly ?array $GoodsItemContainer; // [0..*]    The transporting of a goods item in a unit of transport equipment (e.g., container).
    /** @var FreightAllowanceCharge[]|null */
    public readonly ?array $FreightAllowanceCharge; // [0..*]    A cost incurred by the shipper in moving goods, by whatever means, from one place to another under the terms of the contract of carriage. In addition to transport costs, this may include such elements as packing, documentation, loading, unloading, and insurance to the extent that they relate to the freight costs.
    /** @var InvoiceLine[]|null */
    public readonly ?array $InvoiceLine; // [0..*]    Information about an invoice line relating to this goods item.
    /** @var Temperature[]|null */
    public readonly ?array $Temperature; // [0..*]    The temperature of the goods item.
    /** @var ContainedGoodsItem[]|null */
    public readonly ?array $ContainedGoodsItem; // [0..*]    A goods item contained in this goods item.
    public readonly ?OriginAddress $OriginAddress; // [0..1]    The region in which the goods have been produced or manufactured, according to criteria laid down for the purposes of application of the customs tariff, or of quantitative restrictions, or of any other measure related to trade.
    public readonly ?Delivery $Delivery; // [0..1]    The delivery of this goods item.
    public readonly ?Pickup $Pickup; // [0..1]    The pickup of this goods item.
    public readonly ?Despatch $Despatch; // [0..1]    The despatch of this goods item.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of this goods item.
    /** @var ContainingPackage[]|null */
    public readonly ?array $ContainingPackage; // [0..*]    A package containing this goods item.
    public readonly ?ShipmentDocumentReference $ShipmentDocumentReference; // [0..1]    A reference to a shipping document associated with this goods item.
    public readonly ?MinimumTemperature $MinimumTemperature; // [0..1]    Information about minimum temperature.
    public readonly ?MaximumTemperature $MaximumTemperature; // [0..1]    Information about maximum temperature.

    /**
     * @param Description[]|null            $Description
     * @param Item[]|null                   $Item
     * @param GoodsItemContainer[]|null     $GoodsItemContainer
     * @param FreightAllowanceCharge[]|null $FreightAllowanceCharge
     * @param InvoiceLine[]|null            $InvoiceLine
     * @param Temperature[]|null            $Temperature
     * @param ContainedGoodsItem[]|null     $ContainedGoodsItem
     * @param MeasurementDimension[]|null   $MeasurementDimension
     * @param ContainingPackage[]|null      $ContainingPackage
     */
    public function __construct(?ID $ID, ?SequenceNumberID $SequenceNumberID, ?array $Description, ?HazardousRiskIndicator $HazardousRiskIndicator, ?DeclaredCustomsValueAmount $DeclaredCustomsValueAmount, ?DeclaredForCarriageValueAmount $DeclaredForCarriageValueAmount, ?DeclaredStatisticsValueAmount $DeclaredStatisticsValueAmount, ?FreeOnBoardValueAmount $FreeOnBoardValueAmount, ?InsuranceValueAmount $InsuranceValueAmount, ?ValueAmount $ValueAmount, ?GrossWeightMeasure $GrossWeightMeasure, ?NetWeightMeasure $NetWeightMeasure, ?NetNetWeightMeasure $NetNetWeightMeasure, ?ChargeableWeightMeasure $ChargeableWeightMeasure, ?GrossVolumeMeasure $GrossVolumeMeasure, ?NetVolumeMeasure $NetVolumeMeasure, ?Quantity $Quantity, ?PreferenceCriterionCode $PreferenceCriterionCode, ?RequiredCustomsID $RequiredCustomsID, ?CustomsStatusCode $CustomsStatusCode, ?CustomsTariffQuantity $CustomsTariffQuantity, ?CustomsImportClassifiedIndicator $CustomsImportClassifiedIndicator, ?ChargeableQuantity $ChargeableQuantity, ?ReturnableQuantity $ReturnableQuantity, ?TraceID $TraceID, ?array $Item, ?array $GoodsItemContainer, ?array $FreightAllowanceCharge, ?array $InvoiceLine, ?array $Temperature, ?array $ContainedGoodsItem, ?OriginAddress $OriginAddress, ?Delivery $Delivery, ?Pickup $Pickup, ?Despatch $Despatch, ?array $MeasurementDimension, ?array $ContainingPackage, ?ShipmentDocumentReference $ShipmentDocumentReference, ?MinimumTemperature $MinimumTemperature, ?MaximumTemperature $MaximumTemperature)
    {
        $this->ID = $ID;
        $this->SequenceNumberID = $SequenceNumberID;
        $this->Description = $Description;
        $this->HazardousRiskIndicator = $HazardousRiskIndicator;
        $this->DeclaredCustomsValueAmount = $DeclaredCustomsValueAmount;
        $this->DeclaredForCarriageValueAmount = $DeclaredForCarriageValueAmount;
        $this->DeclaredStatisticsValueAmount = $DeclaredStatisticsValueAmount;
        $this->FreeOnBoardValueAmount = $FreeOnBoardValueAmount;
        $this->InsuranceValueAmount = $InsuranceValueAmount;
        $this->ValueAmount = $ValueAmount;
        $this->GrossWeightMeasure = $GrossWeightMeasure;
        $this->NetWeightMeasure = $NetWeightMeasure;
        $this->NetNetWeightMeasure = $NetNetWeightMeasure;
        $this->ChargeableWeightMeasure = $ChargeableWeightMeasure;
        $this->GrossVolumeMeasure = $GrossVolumeMeasure;
        $this->NetVolumeMeasure = $NetVolumeMeasure;
        $this->Quantity = $Quantity;
        $this->PreferenceCriterionCode = $PreferenceCriterionCode;
        $this->RequiredCustomsID = $RequiredCustomsID;
        $this->CustomsStatusCode = $CustomsStatusCode;
        $this->CustomsTariffQuantity = $CustomsTariffQuantity;
        $this->CustomsImportClassifiedIndicator = $CustomsImportClassifiedIndicator;
        $this->ChargeableQuantity = $ChargeableQuantity;
        $this->ReturnableQuantity = $ReturnableQuantity;
        $this->TraceID = $TraceID;
        $this->Item = $Item;
        $this->GoodsItemContainer = $GoodsItemContainer;
        $this->FreightAllowanceCharge = $FreightAllowanceCharge;
        $this->InvoiceLine = $InvoiceLine;
        $this->Temperature = $Temperature;
        $this->ContainedGoodsItem = $ContainedGoodsItem;
        $this->OriginAddress = $OriginAddress;
        $this->Delivery = $Delivery;
        $this->Pickup = $Pickup;
        $this->Despatch = $Despatch;
        $this->MeasurementDimension = $MeasurementDimension;
        $this->ContainingPackage = $ContainingPackage;
        $this->ShipmentDocumentReference = $ShipmentDocumentReference;
        $this->MinimumTemperature = $MinimumTemperature;
        $this->MaximumTemperature = $MaximumTemperature;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->SequenceNumberID) {
            $response[] = (string) $this->SequenceNumberID;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousRiskIndicator) {
            $response[] = (string) $this->HazardousRiskIndicator;
        }
        if ($this->DeclaredCustomsValueAmount) {
            $response[] = (string) $this->DeclaredCustomsValueAmount;
        }
        if ($this->DeclaredForCarriageValueAmount) {
            $response[] = (string) $this->DeclaredForCarriageValueAmount;
        }
        if ($this->DeclaredStatisticsValueAmount) {
            $response[] = (string) $this->DeclaredStatisticsValueAmount;
        }
        if ($this->FreeOnBoardValueAmount) {
            $response[] = (string) $this->FreeOnBoardValueAmount;
        }
        if ($this->InsuranceValueAmount) {
            $response[] = (string) $this->InsuranceValueAmount;
        }
        if ($this->ValueAmount) {
            $response[] = (string) $this->ValueAmount;
        }
        if ($this->GrossWeightMeasure) {
            $response[] = (string) $this->GrossWeightMeasure;
        }
        if ($this->NetWeightMeasure) {
            $response[] = (string) $this->NetWeightMeasure;
        }
        if ($this->NetNetWeightMeasure) {
            $response[] = (string) $this->NetNetWeightMeasure;
        }
        if ($this->ChargeableWeightMeasure) {
            $response[] = (string) $this->ChargeableWeightMeasure;
        }
        if ($this->GrossVolumeMeasure) {
            $response[] = (string) $this->GrossVolumeMeasure;
        }
        if ($this->NetVolumeMeasure) {
            $response[] = (string) $this->NetVolumeMeasure;
        }
        if ($this->Quantity) {
            $response[] = (string) $this->Quantity;
        }
        if ($this->PreferenceCriterionCode) {
            $response[] = (string) $this->PreferenceCriterionCode;
        }
        if ($this->RequiredCustomsID) {
            $response[] = (string) $this->RequiredCustomsID;
        }
        if ($this->CustomsStatusCode) {
            $response[] = (string) $this->CustomsStatusCode;
        }
        if ($this->CustomsTariffQuantity) {
            $response[] = (string) $this->CustomsTariffQuantity;
        }
        if ($this->CustomsImportClassifiedIndicator) {
            $response[] = (string) $this->CustomsImportClassifiedIndicator;
        }
        if ($this->ChargeableQuantity) {
            $response[] = (string) $this->ChargeableQuantity;
        }
        if ($this->ReturnableQuantity) {
            $response[] = (string) $this->ReturnableQuantity;
        }
        if ($this->TraceID) {
            $response[] = (string) $this->TraceID;
        }
        if ($this->Item) {
            foreach ($this->Item as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->GoodsItemContainer) {
            foreach ($this->GoodsItemContainer as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FreightAllowanceCharge) {
            foreach ($this->FreightAllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->InvoiceLine) {
            foreach ($this->InvoiceLine as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Temperature) {
            foreach ($this->Temperature as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ContainedGoodsItem) {
            foreach ($this->ContainedGoodsItem as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OriginAddress) {
            $response[] = (string) $this->OriginAddress;
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
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ContainingPackage) {
            foreach ($this->ContainingPackage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ShipmentDocumentReference) {
            $response[] = (string) $this->ShipmentDocumentReference;
        }
        if ($this->MinimumTemperature) {
            $response[] = (string) $this->MinimumTemperature;
        }
        if ($this->MaximumTemperature) {
            $response[] = (string) $this->MaximumTemperature;
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
