<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Consignment;
use i3or1s\UBL\CAC\Delivery;
use i3or1s\UBL\CAC\ExportCountry;
use i3or1s\UBL\CAC\FirstArrivalPortLocation;
use i3or1s\UBL\CAC\FreightAllowanceCharge;
use i3or1s\UBL\CAC\GoodsItem;
use i3or1s\UBL\CAC\LastExitPortLocation;
use i3or1s\UBL\CAC\OriginAddress;
use i3or1s\UBL\CAC\ReturnAddress;
use i3or1s\UBL\CAC\ShipmentStage;
use i3or1s\UBL\CAC\TransportHandlingUnit;
use i3or1s\UBL\CBC\ConsignmentQuantity;
use i3or1s\UBL\CBC\DeclaredCustomsValueAmount;
use i3or1s\UBL\CBC\DeclaredForCarriageValueAmount;
use i3or1s\UBL\CBC\DeclaredStatisticsValueAmount;
use i3or1s\UBL\CBC\DeliveryInstructions;
use i3or1s\UBL\CBC\FreeOnBoardValueAmount;
use i3or1s\UBL\CBC\GrossVolumeMeasure;
use i3or1s\UBL\CBC\GrossWeightMeasure;
use i3or1s\UBL\CBC\HandlingCode;
use i3or1s\UBL\CBC\HandlingInstructions;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Information;
use i3or1s\UBL\CBC\InsuranceValueAmount;
use i3or1s\UBL\CBC\NetNetWeightMeasure;
use i3or1s\UBL\CBC\NetVolumeMeasure;
use i3or1s\UBL\CBC\NetWeightMeasure;
use i3or1s\UBL\CBC\ShippingPriorityLevelCode;
use i3or1s\UBL\CBC\SpecialInstructions;
use i3or1s\UBL\CBC\SplitConsignmentIndicator;
use i3or1s\UBL\CBC\TotalGoodsItemQuantity;
use i3or1s\UBL\CBC\TotalTransportHandlingUnitQuantity;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ShipmentType.html.
 */
abstract class ShipmentType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ShipmentType';

    public readonly ID $ID; // [1..1]    An identifier for this shipment.
    public readonly ?ShippingPriorityLevelCode $ShippingPriorityLevelCode; // [0..1]    A code signifying the priority or level of service required for this shipment.
    public readonly ?HandlingCode $HandlingCode; // [0..1]    The handling required for this shipment, expressed as a code.
    /** @var HandlingInstructions[]|null */
    public readonly ?array $HandlingInstructions; // [0..*]    The handling required for this shipment, expressed as text.
    /** @var Information[]|null */
    public readonly ?array $Information; // [0..*]    Free-form text pertinent to this shipment, conveying information that is not contained explicitly in other structures.
    public readonly ?GrossWeightMeasure $GrossWeightMeasure; // [0..1]    The total gross weight of a shipment; the weight of the goods plus packaging plus transport equipment.
    public readonly ?NetWeightMeasure $NetWeightMeasure; // [0..1]    The net weight of this shipment, excluding packaging.
    public readonly ?NetNetWeightMeasure $NetNetWeightMeasure; // [0..1]    The total net weight of this shipment, excluding packaging and transport equipment.
    public readonly ?GrossVolumeMeasure $GrossVolumeMeasure; // [0..1]    The total volume of the goods in this shipment, including packaging.
    public readonly ?NetVolumeMeasure $NetVolumeMeasure; // [0..1]    The total volume of the goods in this shipment, excluding packaging and transport equipment.
    public readonly ?TotalGoodsItemQuantity $TotalGoodsItemQuantity; // [0..1]    The total number of goods items in this shipment.
    public readonly ?TotalTransportHandlingUnitQuantity $TotalTransportHandlingUnitQuantity; // [0..1]    The number of pieces of transport handling equipment (pallets, boxes, cases, etc.) in this shipment.
    public readonly ?InsuranceValueAmount $InsuranceValueAmount; // [0..1]    The amount covered by insurance for this shipment.
    public readonly ?DeclaredCustomsValueAmount $DeclaredCustomsValueAmount; // [0..1]    The total declared value for customs purposes of those goods in this shipment that are subject to the same customs procedure and have the same tariff/statistical heading, country information, and duty regime.
    public readonly ?DeclaredForCarriageValueAmount $DeclaredForCarriageValueAmount; // [0..1]    The value of this shipment, declared by the shipper or his agent solely for the purpose of varying the carrier's level of liability from that provided in the contract of carriage, in case of loss or damage to goods or delayed delivery.
    public readonly ?DeclaredStatisticsValueAmount $DeclaredStatisticsValueAmount; // [0..1]    The value, declared for statistical purposes, of those goods in this shipment that have the same statistical heading.
    public readonly ?FreeOnBoardValueAmount $FreeOnBoardValueAmount; // [0..1]    The monetary amount that has to be or has been paid as calculated under the applicable trade delivery.
    /** @var SpecialInstructions[]|null */
    public readonly ?array $SpecialInstructions; // [0..*]    Special instructions relating to this shipment.
    /** @var DeliveryInstructions[]|null */
    public readonly ?array $DeliveryInstructions; // [0..*]    Delivery instructions relating to this shipment.
    public readonly ?SplitConsignmentIndicator $SplitConsignmentIndicator; // [0..1]    An indicator that the consignment has been split in transit (true) or not (false).
    public readonly ?ConsignmentQuantity $ConsignmentQuantity; // [0..1]    The total number of consignments within this shipment.
    /** @var Consignment[]|null */
    public readonly ?array $Consignment; // [0..*]    A consignment covering this shipment.
    /** @var GoodsItem[]|null */
    public readonly ?array $GoodsItem; // [0..*]    A goods item included in this shipment.
    /** @var ShipmentStage[]|null */
    public readonly ?array $ShipmentStage; // [0..*]    A stage in the transport movement of this shipment.
    public readonly ?Delivery $Delivery; // [0..1]    The delivery of this shipment.
    /** @var TransportHandlingUnit[]|null */
    public readonly ?array $TransportHandlingUnit; // [0..*]    A transport handling unit associated with this shipment.
    public readonly ?ReturnAddress $ReturnAddress; // [0..1]    The address to which a shipment should be returned.
    public readonly ?OriginAddress $OriginAddress; // [0..1]    The region in which the goods have been produced or manufactured, according to criteria laid down for the purposes of application of the customs tariff, or of quantitative restrictions, or of any other measure related to trade.
    public readonly ?FirstArrivalPortLocation $FirstArrivalPortLocation; // [0..1]    The first arrival location of a shipment. This would be a port for sea, an airport for air, a terminal for rail, or a border post for land crossing.
    public readonly ?LastExitPortLocation $LastExitPortLocation; // [0..1]    The final exporting location for a shipment. This would be a port for sea, an airport for air, a terminal for rail, or a border post for land crossing.
    public readonly ?ExportCountry $ExportCountry; // [0..1]    The country from which the goods were originally exported, without any commercial transaction taking place in intermediate countries.
    /** @var FreightAllowanceCharge[]|null */
    public readonly ?array $FreightAllowanceCharge; // [0..*]    A cost incurred by the shipper in moving goods, by whatever means, from one place to another under the terms of the contract of carriage. In addition to transport costs, this may include such elements as packing, documentation, loading, unloading, and insurance to the extent that they relate to the freight costs.

    /**
     * @param HandlingInstructions[]|null   $HandlingInstructions
     * @param Information[]|null            $Information
     * @param SpecialInstructions[]|null    $SpecialInstructions
     * @param DeliveryInstructions[]|null   $DeliveryInstructions
     * @param Consignment[]|null            $Consignment
     * @param GoodsItem[]|null              $GoodsItem
     * @param ShipmentStage[]|null          $ShipmentStage
     * @param TransportHandlingUnit[]|null  $TransportHandlingUnit
     * @param FreightAllowanceCharge[]|null $FreightAllowanceCharge
     */
    public function __construct(ID $ID, ?ShippingPriorityLevelCode $ShippingPriorityLevelCode, ?HandlingCode $HandlingCode, ?array $HandlingInstructions, ?array $Information, ?GrossWeightMeasure $GrossWeightMeasure, ?NetWeightMeasure $NetWeightMeasure, ?NetNetWeightMeasure $NetNetWeightMeasure, ?GrossVolumeMeasure $GrossVolumeMeasure, ?NetVolumeMeasure $NetVolumeMeasure, ?TotalGoodsItemQuantity $TotalGoodsItemQuantity, ?TotalTransportHandlingUnitQuantity $TotalTransportHandlingUnitQuantity, ?InsuranceValueAmount $InsuranceValueAmount, ?DeclaredCustomsValueAmount $DeclaredCustomsValueAmount, ?DeclaredForCarriageValueAmount $DeclaredForCarriageValueAmount, ?DeclaredStatisticsValueAmount $DeclaredStatisticsValueAmount, ?FreeOnBoardValueAmount $FreeOnBoardValueAmount, ?array $SpecialInstructions, ?array $DeliveryInstructions, ?SplitConsignmentIndicator $SplitConsignmentIndicator, ?ConsignmentQuantity $ConsignmentQuantity, ?array $Consignment, ?array $GoodsItem, ?array $ShipmentStage, ?Delivery $Delivery, ?array $TransportHandlingUnit, ?ReturnAddress $ReturnAddress, ?OriginAddress $OriginAddress, ?FirstArrivalPortLocation $FirstArrivalPortLocation, ?LastExitPortLocation $LastExitPortLocation, ?ExportCountry $ExportCountry, ?array $FreightAllowanceCharge)
    {
        $this->ID = $ID;
        $this->ShippingPriorityLevelCode = $ShippingPriorityLevelCode;
        $this->HandlingCode = $HandlingCode;
        $this->HandlingInstructions = $HandlingInstructions;
        $this->Information = $Information;
        $this->GrossWeightMeasure = $GrossWeightMeasure;
        $this->NetWeightMeasure = $NetWeightMeasure;
        $this->NetNetWeightMeasure = $NetNetWeightMeasure;
        $this->GrossVolumeMeasure = $GrossVolumeMeasure;
        $this->NetVolumeMeasure = $NetVolumeMeasure;
        $this->TotalGoodsItemQuantity = $TotalGoodsItemQuantity;
        $this->TotalTransportHandlingUnitQuantity = $TotalTransportHandlingUnitQuantity;
        $this->InsuranceValueAmount = $InsuranceValueAmount;
        $this->DeclaredCustomsValueAmount = $DeclaredCustomsValueAmount;
        $this->DeclaredForCarriageValueAmount = $DeclaredForCarriageValueAmount;
        $this->DeclaredStatisticsValueAmount = $DeclaredStatisticsValueAmount;
        $this->FreeOnBoardValueAmount = $FreeOnBoardValueAmount;
        $this->SpecialInstructions = $SpecialInstructions;
        $this->DeliveryInstructions = $DeliveryInstructions;
        $this->SplitConsignmentIndicator = $SplitConsignmentIndicator;
        $this->ConsignmentQuantity = $ConsignmentQuantity;
        $this->Consignment = $Consignment;
        $this->GoodsItem = $GoodsItem;
        $this->ShipmentStage = $ShipmentStage;
        $this->Delivery = $Delivery;
        $this->TransportHandlingUnit = $TransportHandlingUnit;
        $this->ReturnAddress = $ReturnAddress;
        $this->OriginAddress = $OriginAddress;
        $this->FirstArrivalPortLocation = $FirstArrivalPortLocation;
        $this->LastExitPortLocation = $LastExitPortLocation;
        $this->ExportCountry = $ExportCountry;
        $this->FreightAllowanceCharge = $FreightAllowanceCharge;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->ShippingPriorityLevelCode) {
            $response[] = (string) $this->ShippingPriorityLevelCode;
        }
        if ($this->HandlingCode) {
            $response[] = (string) $this->HandlingCode;
        }
        if ($this->HandlingInstructions) {
            foreach ($this->HandlingInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Information) {
            foreach ($this->Information as $elem) {
                $response[] = (string) $elem;
            }
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
        if ($this->GrossVolumeMeasure) {
            $response[] = (string) $this->GrossVolumeMeasure;
        }
        if ($this->NetVolumeMeasure) {
            $response[] = (string) $this->NetVolumeMeasure;
        }
        if ($this->TotalGoodsItemQuantity) {
            $response[] = (string) $this->TotalGoodsItemQuantity;
        }
        if ($this->TotalTransportHandlingUnitQuantity) {
            $response[] = (string) $this->TotalTransportHandlingUnitQuantity;
        }
        if ($this->InsuranceValueAmount) {
            $response[] = (string) $this->InsuranceValueAmount;
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
        if ($this->SpecialInstructions) {
            foreach ($this->SpecialInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DeliveryInstructions) {
            foreach ($this->DeliveryInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SplitConsignmentIndicator) {
            $response[] = (string) $this->SplitConsignmentIndicator;
        }
        if ($this->ConsignmentQuantity) {
            $response[] = (string) $this->ConsignmentQuantity;
        }
        if ($this->Consignment) {
            foreach ($this->Consignment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->GoodsItem) {
            foreach ($this->GoodsItem as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ShipmentStage) {
            foreach ($this->ShipmentStage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Delivery) {
            $response[] = (string) $this->Delivery;
        }
        if ($this->TransportHandlingUnit) {
            foreach ($this->TransportHandlingUnit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReturnAddress) {
            $response[] = (string) $this->ReturnAddress;
        }
        if ($this->OriginAddress) {
            $response[] = (string) $this->OriginAddress;
        }
        if ($this->FirstArrivalPortLocation) {
            $response[] = (string) $this->FirstArrivalPortLocation;
        }
        if ($this->LastExitPortLocation) {
            $response[] = (string) $this->LastExitPortLocation;
        }
        if ($this->ExportCountry) {
            $response[] = (string) $this->ExportCountry;
        }
        if ($this->FreightAllowanceCharge) {
            foreach ($this->FreightAllowanceCharge as $elem) {
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
