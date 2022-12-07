<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ApplicableTransportMeans;
use i3or1s\UBL\CAC\AttachedTransportEquipment;
use i3or1s\UBL\CAC\ContainedInTransportEquipment;
use i3or1s\UBL\CAC\Delivery;
use i3or1s\UBL\CAC\DeliveryTransportEvent;
use i3or1s\UBL\CAC\Despatch;
use i3or1s\UBL\CAC\FreightAllowanceCharge;
use i3or1s\UBL\CAC\GoodsItem;
use i3or1s\UBL\CAC\HandlingTransportEvent;
use i3or1s\UBL\CAC\HaulageTradingTerms;
use i3or1s\UBL\CAC\HazardousGoodsTransit;
use i3or1s\UBL\CAC\LoadingLocation;
use i3or1s\UBL\CAC\LoadingProofParty;
use i3or1s\UBL\CAC\LoadingTransportEvent;
use i3or1s\UBL\CAC\MaximumTemperature;
use i3or1s\UBL\CAC\MeasurementDimension;
use i3or1s\UBL\CAC\MinimumTemperature;
use i3or1s\UBL\CAC\OperatingParty;
use i3or1s\UBL\CAC\OwnerParty;
use i3or1s\UBL\CAC\Package;
use i3or1s\UBL\CAC\PackagedTransportHandlingUnit;
use i3or1s\UBL\CAC\Pickup;
use i3or1s\UBL\CAC\PickupTransportEvent;
use i3or1s\UBL\CAC\PositioningTransportEvent;
use i3or1s\UBL\CAC\ProviderParty;
use i3or1s\UBL\CAC\QuarantineTransportEvent;
use i3or1s\UBL\CAC\ServiceAllowanceCharge;
use i3or1s\UBL\CAC\ShipmentDocumentReference;
use i3or1s\UBL\CAC\StorageLocation;
use i3or1s\UBL\CAC\SupplierParty;
use i3or1s\UBL\CAC\TransportEquipmentSeal;
use i3or1s\UBL\CAC\TransportEvent;
use i3or1s\UBL\CAC\UnloadingLocation;
use i3or1s\UBL\CBC\AirFlowPercent;
use i3or1s\UBL\CBC\AnimalFoodApprovedIndicator;
use i3or1s\UBL\CBC\Characteristics;
use i3or1s\UBL\CBC\DamageRemarks;
use i3or1s\UBL\CBC\DangerousGoodsApprovedIndicator;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\DispositionCode;
use i3or1s\UBL\CBC\FullnessIndicationCode;
use i3or1s\UBL\CBC\GrossVolumeMeasure;
use i3or1s\UBL\CBC\GrossWeightMeasure;
use i3or1s\UBL\CBC\HumanFoodApprovedIndicator;
use i3or1s\UBL\CBC\HumidityPercent;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Information;
use i3or1s\UBL\CBC\LegalStatusIndicator;
use i3or1s\UBL\CBC\OwnerTypeCode;
use i3or1s\UBL\CBC\PowerIndicator;
use i3or1s\UBL\CBC\ProviderTypeCode;
use i3or1s\UBL\CBC\ReferencedConsignmentID;
use i3or1s\UBL\CBC\RefrigeratedIndicator;
use i3or1s\UBL\CBC\RefrigerationOnIndicator;
use i3or1s\UBL\CBC\ReturnabilityIndicator;
use i3or1s\UBL\CBC\SizeTypeCode;
use i3or1s\UBL\CBC\SpecialTransportRequirements;
use i3or1s\UBL\CBC\TareWeightMeasure;
use i3or1s\UBL\CBC\TraceID;
use i3or1s\UBL\CBC\TrackingDeviceCode;
use i3or1s\UBL\CBC\TransportEquipmentTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TransportEquipmentType.html.
 */
abstract class TransportEquipmentType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportEquipmentType';

    public readonly ?ID $ID; // [0..1]    An identifier for this piece of transport equipment.
    /** @var ReferencedConsignmentID[]|null */
    public readonly ?array $ReferencedConsignmentID; // [0..*]    An identifier for the consignment contained by this piece of transport equipment.
    public readonly ?TransportEquipmentTypeCode $TransportEquipmentTypeCode; // [0..1]    A code signifying the type of this piece of transport equipment.
    public readonly ?ProviderTypeCode $ProviderTypeCode; // [0..1]    A code signifying the type of provider of this piece of transport equipment.
    public readonly ?OwnerTypeCode $OwnerTypeCode; // [0..1]    A code signifying the type of owner of this piece of transport equipment.
    public readonly ?SizeTypeCode $SizeTypeCode; // [0..1]    A code signifying the size and type of this piece of piece of transport equipment. When the piece of transport equipment is a shipping container, it is recommended to use ContainerSizeTypeCode for validation.
    public readonly ?DispositionCode $DispositionCode; // [0..1]    A code signifying the current disposition of this piece of transport equipment.
    public readonly ?FullnessIndicationCode $FullnessIndicationCode; // [0..1]    A code signifying whether this piece of transport equipment is full, partially full, or empty.
    public readonly ?RefrigerationOnIndicator $RefrigerationOnIndicator; // [0..1]    An indicator that this piece of transport equipment's refrigeration is on (true) or off (false).
    /** @var Information[]|null */
    public readonly ?array $Information; // [0..*]    Additional information about this piece of transport equipment.
    public readonly ?ReturnabilityIndicator $ReturnabilityIndicator; // [0..1]    An indicator that this piece of transport equipment is returnable (true) or not (false).
    public readonly ?LegalStatusIndicator $LegalStatusIndicator; // [0..1]    An indication of the legal status of this piece of transport equipment with respect to the Container Convention Code.
    public readonly ?AirFlowPercent $AirFlowPercent; // [0..1]    The percent of the airflow within this piece of transport equipment.
    public readonly ?HumidityPercent $HumidityPercent; // [0..1]    The percent humidity within this piece of transport equipment.
    public readonly ?AnimalFoodApprovedIndicator $AnimalFoodApprovedIndicator; // [0..1]    An indicator that this piece of transport equipment is approved for animal food (true) or not (false).
    public readonly ?HumanFoodApprovedIndicator $HumanFoodApprovedIndicator; // [0..1]    An indicator that this piece of transport equipment is approved for human food (true) or not (false).
    public readonly ?DangerousGoodsApprovedIndicator $DangerousGoodsApprovedIndicator; // [0..1]    An indicator that this piece of transport equipment is approved for dangerous goods (true) or not (false).
    public readonly ?RefrigeratedIndicator $RefrigeratedIndicator; // [0..1]    An indicator that this piece of transport equipment is refrigerated (true) or not (false).
    public readonly ?Characteristics $Characteristics; // [0..1]    Characteristics of this piece of transport equipment.
    /** @var DamageRemarks[]|null */
    public readonly ?array $DamageRemarks; // [0..*]    Damage associated with this piece of transport equipment.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this piece of transport equipment.
    /** @var SpecialTransportRequirements[]|null */
    public readonly ?array $SpecialTransportRequirements; // [0..*]    Special transport requirements expressed as text.
    public readonly ?GrossWeightMeasure $GrossWeightMeasure; // [0..1]    The gross weight of this piece of transport equipment.
    public readonly ?GrossVolumeMeasure $GrossVolumeMeasure; // [0..1]    The gross volume of this piece of transport equipment.
    public readonly ?TareWeightMeasure $TareWeightMeasure; // [0..1]    The weight of this piece of transport equipment when empty.
    public readonly ?TrackingDeviceCode $TrackingDeviceCode; // [0..1]    A code signifying the tracking device for this piece of transport equipment.
    public readonly ?PowerIndicator $PowerIndicator; // [0..1]    An indicator that this piece of transport equipment can supply power (true) or not (false).
    public readonly ?TraceID $TraceID; // [0..1]    An identifier for use in tracing this piece of transport equipment, such as the EPC number used in RFID.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of this piece of transport equipment.
    /** @var TransportEquipmentSeal[]|null */
    public readonly ?array $TransportEquipmentSeal; // [0..*]    A seal securing the door of a piece of transport equipment.
    public readonly ?MinimumTemperature $MinimumTemperature; // [0..1]    In the case of a refrigeration unit, the minimum allowable operating temperature for this container.
    public readonly ?MaximumTemperature $MaximumTemperature; // [0..1]    In the case of a refrigeration unit, the maximum allowable operating temperature for this container.
    public readonly ?ProviderParty $ProviderParty; // [0..1]    The party providing this piece of transport equipment.
    public readonly ?LoadingProofParty $LoadingProofParty; // [0..1]    The authorized party responsible for certifying that the goods were loaded into this piece of transport equipment.
    public readonly ?SupplierParty $SupplierParty; // [0..1]    The party that supplies this piece of transport equipment.
    public readonly ?OwnerParty $OwnerParty; // [0..1]    The party that owns this piece of transport equipment.
    public readonly ?OperatingParty $OperatingParty; // [0..1]    The party that operates this piece of transport equipment.
    public readonly ?LoadingLocation $LoadingLocation; // [0..1]    The location where this piece of transport equipment is loaded.
    public readonly ?UnloadingLocation $UnloadingLocation; // [0..1]    The location where this piece of transport equipment is unloaded.
    public readonly ?StorageLocation $StorageLocation; // [0..1]    The location where this piece of transport equipment is being stored.
    /** @var PositioningTransportEvent[]|null */
    public readonly ?array $PositioningTransportEvent; // [0..*]    A positioning of this piece of transport equipment.
    /** @var QuarantineTransportEvent[]|null */
    public readonly ?array $QuarantineTransportEvent; // [0..*]    A quarantine of this piece of transport equipment.
    /** @var DeliveryTransportEvent[]|null */
    public readonly ?array $DeliveryTransportEvent; // [0..*]    A delivery of this piece of transport equipment.
    /** @var PickupTransportEvent[]|null */
    public readonly ?array $PickupTransportEvent; // [0..*]    A pickup of this piece of transport equipment.
    /** @var HandlingTransportEvent[]|null */
    public readonly ?array $HandlingTransportEvent; // [0..*]    A handling of this piece of transport equipment.
    /** @var LoadingTransportEvent[]|null */
    public readonly ?array $LoadingTransportEvent; // [0..*]    A loading of this piece of transport equipment.
    /** @var TransportEvent[]|null */
    public readonly ?array $TransportEvent; // [0..*]    A transport event associated with this piece of transport equipment.
    public readonly ?ApplicableTransportMeans $ApplicableTransportMeans; // [0..1]    The applicable transport means associated with this piece of transport equipment.
    /** @var HaulageTradingTerms[]|null */
    public readonly ?array $HaulageTradingTerms; // [0..*]    A set of haulage trading terms associated with this piece of transport equipment.
    /** @var HazardousGoodsTransit[]|null */
    public readonly ?array $HazardousGoodsTransit; // [0..*]    Transit-related information regarding a type of hazardous goods contained in this piece of transport equipment.
    /** @var PackagedTransportHandlingUnit[]|null */
    public readonly ?array $PackagedTransportHandlingUnit; // [0..*]    A packaged transport handling unit associated with this piece of transport equipment.
    /** @var ServiceAllowanceCharge[]|null */
    public readonly ?array $ServiceAllowanceCharge; // [0..*]    A service allowance charge associated with this piece of transport equipment.
    /** @var FreightAllowanceCharge[]|null */
    public readonly ?array $FreightAllowanceCharge; // [0..*]    A freight allowance charge associated with this piece of transport equipment.
    /** @var AttachedTransportEquipment[]|null */
    public readonly ?array $AttachedTransportEquipment; // [0..*]    A piece of transport equipment attached to this piece of transport equipment.
    public readonly ?Delivery $Delivery; // [0..1]    The delivery of this piece of transport equipment.
    public readonly ?Pickup $Pickup; // [0..1]    The pickup of this piece of transport equipment.
    public readonly ?Despatch $Despatch; // [0..1]    The despatch of this piece of transport equipment.
    /** @var ShipmentDocumentReference[]|null */
    public readonly ?array $ShipmentDocumentReference; // [0..*]    A reference to a shipping document associated with this piece of transport equipment.
    /** @var ContainedInTransportEquipment[]|null */
    public readonly ?array $ContainedInTransportEquipment; // [0..*]    A piece of transport equipment contained in this piece of transport equipment.
    /** @var Package[]|null */
    public readonly ?array $Package; // [0..*]    A package contained in this piece of transport equipment.
    /** @var GoodsItem[]|null */
    public readonly ?array $GoodsItem; // [0..*]    A goods item contained in this piece of transport equipment.

    /**
     * @param ReferencedConsignmentID[]|null       $ReferencedConsignmentID
     * @param Information[]|null                   $Information
     * @param DamageRemarks[]|null                 $DamageRemarks
     * @param Description[]|null                   $Description
     * @param SpecialTransportRequirements[]|null  $SpecialTransportRequirements
     * @param MeasurementDimension[]|null          $MeasurementDimension
     * @param TransportEquipmentSeal[]|null        $TransportEquipmentSeal
     * @param PositioningTransportEvent[]|null     $PositioningTransportEvent
     * @param QuarantineTransportEvent[]|null      $QuarantineTransportEvent
     * @param DeliveryTransportEvent[]|null        $DeliveryTransportEvent
     * @param PickupTransportEvent[]|null          $PickupTransportEvent
     * @param HandlingTransportEvent[]|null        $HandlingTransportEvent
     * @param LoadingTransportEvent[]|null         $LoadingTransportEvent
     * @param TransportEvent[]|null                $TransportEvent
     * @param HaulageTradingTerms[]|null           $HaulageTradingTerms
     * @param HazardousGoodsTransit[]|null         $HazardousGoodsTransit
     * @param PackagedTransportHandlingUnit[]|null $PackagedTransportHandlingUnit
     * @param ServiceAllowanceCharge[]|null        $ServiceAllowanceCharge
     * @param FreightAllowanceCharge[]|null        $FreightAllowanceCharge
     * @param AttachedTransportEquipment[]|null    $AttachedTransportEquipment
     * @param ShipmentDocumentReference[]|null     $ShipmentDocumentReference
     * @param ContainedInTransportEquipment[]|null $ContainedInTransportEquipment
     * @param Package[]|null                       $Package
     * @param GoodsItem[]|null                     $GoodsItem
     */
    public function __construct(?ID $ID, ?array $ReferencedConsignmentID, ?TransportEquipmentTypeCode $TransportEquipmentTypeCode, ?ProviderTypeCode $ProviderTypeCode, ?OwnerTypeCode $OwnerTypeCode, ?SizeTypeCode $SizeTypeCode, ?DispositionCode $DispositionCode, ?FullnessIndicationCode $FullnessIndicationCode, ?RefrigerationOnIndicator $RefrigerationOnIndicator, ?array $Information, ?ReturnabilityIndicator $ReturnabilityIndicator, ?LegalStatusIndicator $LegalStatusIndicator, ?AirFlowPercent $AirFlowPercent, ?HumidityPercent $HumidityPercent, ?AnimalFoodApprovedIndicator $AnimalFoodApprovedIndicator, ?HumanFoodApprovedIndicator $HumanFoodApprovedIndicator, ?DangerousGoodsApprovedIndicator $DangerousGoodsApprovedIndicator, ?RefrigeratedIndicator $RefrigeratedIndicator, ?Characteristics $Characteristics, ?array $DamageRemarks, ?array $Description, ?array $SpecialTransportRequirements, ?GrossWeightMeasure $GrossWeightMeasure, ?GrossVolumeMeasure $GrossVolumeMeasure, ?TareWeightMeasure $TareWeightMeasure, ?TrackingDeviceCode $TrackingDeviceCode, ?PowerIndicator $PowerIndicator, ?TraceID $TraceID, ?array $MeasurementDimension, ?array $TransportEquipmentSeal, ?MinimumTemperature $MinimumTemperature, ?MaximumTemperature $MaximumTemperature, ?ProviderParty $ProviderParty, ?LoadingProofParty $LoadingProofParty, ?SupplierParty $SupplierParty, ?OwnerParty $OwnerParty, ?OperatingParty $OperatingParty, ?LoadingLocation $LoadingLocation, ?UnloadingLocation $UnloadingLocation, ?StorageLocation $StorageLocation, ?array $PositioningTransportEvent, ?array $QuarantineTransportEvent, ?array $DeliveryTransportEvent, ?array $PickupTransportEvent, ?array $HandlingTransportEvent, ?array $LoadingTransportEvent, ?array $TransportEvent, ?ApplicableTransportMeans $ApplicableTransportMeans, ?array $HaulageTradingTerms, ?array $HazardousGoodsTransit, ?array $PackagedTransportHandlingUnit, ?array $ServiceAllowanceCharge, ?array $FreightAllowanceCharge, ?array $AttachedTransportEquipment, ?Delivery $Delivery, ?Pickup $Pickup, ?Despatch $Despatch, ?array $ShipmentDocumentReference, ?array $ContainedInTransportEquipment, ?array $Package, ?array $GoodsItem)
    {
        $this->ID = $ID;
        $this->ReferencedConsignmentID = $ReferencedConsignmentID;
        $this->TransportEquipmentTypeCode = $TransportEquipmentTypeCode;
        $this->ProviderTypeCode = $ProviderTypeCode;
        $this->OwnerTypeCode = $OwnerTypeCode;
        $this->SizeTypeCode = $SizeTypeCode;
        $this->DispositionCode = $DispositionCode;
        $this->FullnessIndicationCode = $FullnessIndicationCode;
        $this->RefrigerationOnIndicator = $RefrigerationOnIndicator;
        $this->Information = $Information;
        $this->ReturnabilityIndicator = $ReturnabilityIndicator;
        $this->LegalStatusIndicator = $LegalStatusIndicator;
        $this->AirFlowPercent = $AirFlowPercent;
        $this->HumidityPercent = $HumidityPercent;
        $this->AnimalFoodApprovedIndicator = $AnimalFoodApprovedIndicator;
        $this->HumanFoodApprovedIndicator = $HumanFoodApprovedIndicator;
        $this->DangerousGoodsApprovedIndicator = $DangerousGoodsApprovedIndicator;
        $this->RefrigeratedIndicator = $RefrigeratedIndicator;
        $this->Characteristics = $Characteristics;
        $this->DamageRemarks = $DamageRemarks;
        $this->Description = $Description;
        $this->SpecialTransportRequirements = $SpecialTransportRequirements;
        $this->GrossWeightMeasure = $GrossWeightMeasure;
        $this->GrossVolumeMeasure = $GrossVolumeMeasure;
        $this->TareWeightMeasure = $TareWeightMeasure;
        $this->TrackingDeviceCode = $TrackingDeviceCode;
        $this->PowerIndicator = $PowerIndicator;
        $this->TraceID = $TraceID;
        $this->MeasurementDimension = $MeasurementDimension;
        $this->TransportEquipmentSeal = $TransportEquipmentSeal;
        $this->MinimumTemperature = $MinimumTemperature;
        $this->MaximumTemperature = $MaximumTemperature;
        $this->ProviderParty = $ProviderParty;
        $this->LoadingProofParty = $LoadingProofParty;
        $this->SupplierParty = $SupplierParty;
        $this->OwnerParty = $OwnerParty;
        $this->OperatingParty = $OperatingParty;
        $this->LoadingLocation = $LoadingLocation;
        $this->UnloadingLocation = $UnloadingLocation;
        $this->StorageLocation = $StorageLocation;
        $this->PositioningTransportEvent = $PositioningTransportEvent;
        $this->QuarantineTransportEvent = $QuarantineTransportEvent;
        $this->DeliveryTransportEvent = $DeliveryTransportEvent;
        $this->PickupTransportEvent = $PickupTransportEvent;
        $this->HandlingTransportEvent = $HandlingTransportEvent;
        $this->LoadingTransportEvent = $LoadingTransportEvent;
        $this->TransportEvent = $TransportEvent;
        $this->ApplicableTransportMeans = $ApplicableTransportMeans;
        $this->HaulageTradingTerms = $HaulageTradingTerms;
        $this->HazardousGoodsTransit = $HazardousGoodsTransit;
        $this->PackagedTransportHandlingUnit = $PackagedTransportHandlingUnit;
        $this->ServiceAllowanceCharge = $ServiceAllowanceCharge;
        $this->FreightAllowanceCharge = $FreightAllowanceCharge;
        $this->AttachedTransportEquipment = $AttachedTransportEquipment;
        $this->Delivery = $Delivery;
        $this->Pickup = $Pickup;
        $this->Despatch = $Despatch;
        $this->ShipmentDocumentReference = $ShipmentDocumentReference;
        $this->ContainedInTransportEquipment = $ContainedInTransportEquipment;
        $this->Package = $Package;
        $this->GoodsItem = $GoodsItem;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->ReferencedConsignmentID) {
            foreach ($this->ReferencedConsignmentID as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportEquipmentTypeCode) {
            $response[] = (string) $this->TransportEquipmentTypeCode;
        }
        if ($this->ProviderTypeCode) {
            $response[] = (string) $this->ProviderTypeCode;
        }
        if ($this->OwnerTypeCode) {
            $response[] = (string) $this->OwnerTypeCode;
        }
        if ($this->SizeTypeCode) {
            $response[] = (string) $this->SizeTypeCode;
        }
        if ($this->DispositionCode) {
            $response[] = (string) $this->DispositionCode;
        }
        if ($this->FullnessIndicationCode) {
            $response[] = (string) $this->FullnessIndicationCode;
        }
        if ($this->RefrigerationOnIndicator) {
            $response[] = (string) $this->RefrigerationOnIndicator;
        }
        if ($this->Information) {
            foreach ($this->Information as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReturnabilityIndicator) {
            $response[] = (string) $this->ReturnabilityIndicator;
        }
        if ($this->LegalStatusIndicator) {
            $response[] = (string) $this->LegalStatusIndicator;
        }
        if ($this->AirFlowPercent) {
            $response[] = (string) $this->AirFlowPercent;
        }
        if ($this->HumidityPercent) {
            $response[] = (string) $this->HumidityPercent;
        }
        if ($this->AnimalFoodApprovedIndicator) {
            $response[] = (string) $this->AnimalFoodApprovedIndicator;
        }
        if ($this->HumanFoodApprovedIndicator) {
            $response[] = (string) $this->HumanFoodApprovedIndicator;
        }
        if ($this->DangerousGoodsApprovedIndicator) {
            $response[] = (string) $this->DangerousGoodsApprovedIndicator;
        }
        if ($this->RefrigeratedIndicator) {
            $response[] = (string) $this->RefrigeratedIndicator;
        }
        if ($this->Characteristics) {
            $response[] = (string) $this->Characteristics;
        }
        if ($this->DamageRemarks) {
            foreach ($this->DamageRemarks as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SpecialTransportRequirements) {
            foreach ($this->SpecialTransportRequirements as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->GrossWeightMeasure) {
            $response[] = (string) $this->GrossWeightMeasure;
        }
        if ($this->GrossVolumeMeasure) {
            $response[] = (string) $this->GrossVolumeMeasure;
        }
        if ($this->TareWeightMeasure) {
            $response[] = (string) $this->TareWeightMeasure;
        }
        if ($this->TrackingDeviceCode) {
            $response[] = (string) $this->TrackingDeviceCode;
        }
        if ($this->PowerIndicator) {
            $response[] = (string) $this->PowerIndicator;
        }
        if ($this->TraceID) {
            $response[] = (string) $this->TraceID;
        }
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportEquipmentSeal) {
            foreach ($this->TransportEquipmentSeal as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MinimumTemperature) {
            $response[] = (string) $this->MinimumTemperature;
        }
        if ($this->MaximumTemperature) {
            $response[] = (string) $this->MaximumTemperature;
        }
        if ($this->ProviderParty) {
            $response[] = (string) $this->ProviderParty;
        }
        if ($this->LoadingProofParty) {
            $response[] = (string) $this->LoadingProofParty;
        }
        if ($this->SupplierParty) {
            $response[] = (string) $this->SupplierParty;
        }
        if ($this->OwnerParty) {
            $response[] = (string) $this->OwnerParty;
        }
        if ($this->OperatingParty) {
            $response[] = (string) $this->OperatingParty;
        }
        if ($this->LoadingLocation) {
            $response[] = (string) $this->LoadingLocation;
        }
        if ($this->UnloadingLocation) {
            $response[] = (string) $this->UnloadingLocation;
        }
        if ($this->StorageLocation) {
            $response[] = (string) $this->StorageLocation;
        }
        if ($this->PositioningTransportEvent) {
            foreach ($this->PositioningTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->QuarantineTransportEvent) {
            foreach ($this->QuarantineTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DeliveryTransportEvent) {
            foreach ($this->DeliveryTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PickupTransportEvent) {
            foreach ($this->PickupTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HandlingTransportEvent) {
            foreach ($this->HandlingTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->LoadingTransportEvent) {
            foreach ($this->LoadingTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportEvent) {
            foreach ($this->TransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ApplicableTransportMeans) {
            $response[] = (string) $this->ApplicableTransportMeans;
        }
        if ($this->HaulageTradingTerms) {
            foreach ($this->HaulageTradingTerms as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousGoodsTransit) {
            foreach ($this->HazardousGoodsTransit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PackagedTransportHandlingUnit) {
            foreach ($this->PackagedTransportHandlingUnit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ServiceAllowanceCharge) {
            foreach ($this->ServiceAllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FreightAllowanceCharge) {
            foreach ($this->FreightAllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->AttachedTransportEquipment) {
            foreach ($this->AttachedTransportEquipment as $elem) {
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
        if ($this->ShipmentDocumentReference) {
            foreach ($this->ShipmentDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ContainedInTransportEquipment) {
            foreach ($this->ContainedInTransportEquipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Package) {
            foreach ($this->Package as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->GoodsItem) {
            foreach ($this->GoodsItem as $elem) {
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
