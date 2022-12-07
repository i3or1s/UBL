<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\CommodityClassification;
use i3or1s\UBL\CAC\EnvironmentalEmission;
use i3or1s\UBL\CAC\EstimatedDurationPeriod;
use i3or1s\UBL\CAC\ResponsibleTransportServiceProviderParty;
use i3or1s\UBL\CAC\ScheduledServiceFrequency;
use i3or1s\UBL\CAC\ShipmentStage;
use i3or1s\UBL\CAC\SupportedCommodityClassification;
use i3or1s\UBL\CAC\SupportedTransportEquipment;
use i3or1s\UBL\CAC\TotalCapacityDimension;
use i3or1s\UBL\CAC\TransportEquipment;
use i3or1s\UBL\CAC\TransportEvent;
use i3or1s\UBL\CAC\UnsupportedCommodityClassification;
use i3or1s\UBL\CAC\UnsupportedTransportEquipment;
use i3or1s\UBL\CBC\FreightRateClassCode;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\NominationDate;
use i3or1s\UBL\CBC\NominationTime;
use i3or1s\UBL\CBC\Priority;
use i3or1s\UBL\CBC\SequenceNumeric;
use i3or1s\UBL\CBC\TariffClassCode;
use i3or1s\UBL\CBC\TransportationServiceDescription;
use i3or1s\UBL\CBC\TransportationServiceDetailsURI;
use i3or1s\UBL\CBC\TransportServiceCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TransportationServiceType.html.
 */
abstract class TransportationServiceType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportationServiceType';

    public readonly TransportServiceCode $TransportServiceCode; // [1..1]    A code signifying the extent of this transportation service (e.g., door-to-door, port-to-port).
    public readonly ?TariffClassCode $TariffClassCode; // [0..1]    A code signifying the tariff class applicable to this transportation service.
    public readonly ?Priority $Priority; // [0..1]    The priority of this transportation service.
    public readonly ?FreightRateClassCode $FreightRateClassCode; // [0..1]    A code signifying the rate class for freight in this transportation service.
    /** @var TransportationServiceDescription[]|null */
    public readonly ?array $TransportationServiceDescription; // [0..*]    Text describing this transportation service.
    public readonly ?TransportationServiceDetailsURI $TransportationServiceDetailsURI; // [0..1]    The Uniform Resource Identifier (URI) of a document providing additional details regarding this transportation service.
    public readonly ?NominationDate $NominationDate; // [0..1]    In a transport contract, the deadline date by which this transportation service has to be booked. For example, if this service is scheduled for Wednesday 16 February 2011 at 10 a.m. CET, the nomination date might be Tuesday15 February 2011.
    public readonly ?NominationTime $NominationTime; // [0..1]    In a transport contract, the deadline time by which this transportation service has to be booked. For example, if this service is scheduled for Wednesday 16 February 2011 at 10 a.m. CET, the nomination date might be Tuesday15 February 2011 and the nomination time 4 p.m. at the latest.
    public readonly ?Name $Name; // [0..1]    The name of this transportation service.
    public readonly ?SequenceNumeric $SequenceNumeric; // [0..1]    A number indicating the order of this transportation service in a sequence of transportation services.
    /** @var TransportEquipment[]|null */
    public readonly ?array $TransportEquipment; // [0..*]    A piece of transport equipment used in this transportation service.
    /** @var SupportedTransportEquipment[]|null */
    public readonly ?array $SupportedTransportEquipment; // [0..*]    A piece of transport equipment supported in this transportation service.
    /** @var UnsupportedTransportEquipment[]|null */
    public readonly ?array $UnsupportedTransportEquipment; // [0..*]    A piece of transport equipment that is not supported in this transportation service.
    /** @var CommodityClassification[]|null */
    public readonly ?array $CommodityClassification; // [0..*]    A classification of this transportation service.
    /** @var SupportedCommodityClassification[]|null */
    public readonly ?array $SupportedCommodityClassification; // [0..*]    A classification (e.g., general cargo) for commodities that can be handled in this transportation service.
    /** @var UnsupportedCommodityClassification[]|null */
    public readonly ?array $UnsupportedCommodityClassification; // [0..*]    A classification for commodities that cannot be handled in this transportation service.
    public readonly ?TotalCapacityDimension $TotalCapacityDimension; // [0..1]    The total capacity or volume available in this transportation service.
    /** @var ShipmentStage[]|null */
    public readonly ?array $ShipmentStage; // [0..*]    One of the stages of shipment in this transportation service.
    /** @var TransportEvent[]|null */
    public readonly ?array $TransportEvent; // [0..*]    One of the transport events taking place in this transportation service.
    public readonly ?ResponsibleTransportServiceProviderParty $ResponsibleTransportServiceProviderParty; // [0..1]    The transport service provider responsible for this transportation service.
    /** @var EnvironmentalEmission[]|null */
    public readonly ?array $EnvironmentalEmission; // [0..*]    An environmental emission resulting from this transportation service.
    public readonly ?EstimatedDurationPeriod $EstimatedDurationPeriod; // [0..1]    The estimated duration of this transportation service.
    /** @var ScheduledServiceFrequency[]|null */
    public readonly ?array $ScheduledServiceFrequency; // [0..*]    A class to specify which day of the week a transport service is operational.

    /**
     * @param TransportationServiceDescription[]|null   $TransportationServiceDescription
     * @param TransportEquipment[]|null                 $TransportEquipment
     * @param SupportedTransportEquipment[]|null        $SupportedTransportEquipment
     * @param UnsupportedTransportEquipment[]|null      $UnsupportedTransportEquipment
     * @param CommodityClassification[]|null            $CommodityClassification
     * @param SupportedCommodityClassification[]|null   $SupportedCommodityClassification
     * @param UnsupportedCommodityClassification[]|null $UnsupportedCommodityClassification
     * @param ShipmentStage[]|null                      $ShipmentStage
     * @param TransportEvent[]|null                     $TransportEvent
     * @param EnvironmentalEmission[]|null              $EnvironmentalEmission
     * @param ScheduledServiceFrequency[]|null          $ScheduledServiceFrequency
     */
    public function __construct(TransportServiceCode $TransportServiceCode, ?TariffClassCode $TariffClassCode, ?Priority $Priority, ?FreightRateClassCode $FreightRateClassCode, ?array $TransportationServiceDescription, ?TransportationServiceDetailsURI $TransportationServiceDetailsURI, ?NominationDate $NominationDate, ?NominationTime $NominationTime, ?Name $Name, ?SequenceNumeric $SequenceNumeric, ?array $TransportEquipment, ?array $SupportedTransportEquipment, ?array $UnsupportedTransportEquipment, ?array $CommodityClassification, ?array $SupportedCommodityClassification, ?array $UnsupportedCommodityClassification, ?TotalCapacityDimension $TotalCapacityDimension, ?array $ShipmentStage, ?array $TransportEvent, ?ResponsibleTransportServiceProviderParty $ResponsibleTransportServiceProviderParty, ?array $EnvironmentalEmission, ?EstimatedDurationPeriod $EstimatedDurationPeriod, ?array $ScheduledServiceFrequency)
    {
        $this->TransportServiceCode = $TransportServiceCode;
        $this->TariffClassCode = $TariffClassCode;
        $this->Priority = $Priority;
        $this->FreightRateClassCode = $FreightRateClassCode;
        $this->TransportationServiceDescription = $TransportationServiceDescription;
        $this->TransportationServiceDetailsURI = $TransportationServiceDetailsURI;
        $this->NominationDate = $NominationDate;
        $this->NominationTime = $NominationTime;
        $this->Name = $Name;
        $this->SequenceNumeric = $SequenceNumeric;
        $this->TransportEquipment = $TransportEquipment;
        $this->SupportedTransportEquipment = $SupportedTransportEquipment;
        $this->UnsupportedTransportEquipment = $UnsupportedTransportEquipment;
        $this->CommodityClassification = $CommodityClassification;
        $this->SupportedCommodityClassification = $SupportedCommodityClassification;
        $this->UnsupportedCommodityClassification = $UnsupportedCommodityClassification;
        $this->TotalCapacityDimension = $TotalCapacityDimension;
        $this->ShipmentStage = $ShipmentStage;
        $this->TransportEvent = $TransportEvent;
        $this->ResponsibleTransportServiceProviderParty = $ResponsibleTransportServiceProviderParty;
        $this->EnvironmentalEmission = $EnvironmentalEmission;
        $this->EstimatedDurationPeriod = $EstimatedDurationPeriod;
        $this->ScheduledServiceFrequency = $ScheduledServiceFrequency;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->TransportServiceCode;
        if ($this->TariffClassCode) {
            $response[] = (string) $this->TariffClassCode;
        }
        if ($this->Priority) {
            $response[] = (string) $this->Priority;
        }
        if ($this->FreightRateClassCode) {
            $response[] = (string) $this->FreightRateClassCode;
        }
        if ($this->TransportationServiceDescription) {
            foreach ($this->TransportationServiceDescription as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportationServiceDetailsURI) {
            $response[] = (string) $this->TransportationServiceDetailsURI;
        }
        if ($this->NominationDate) {
            $response[] = (string) $this->NominationDate;
        }
        if ($this->NominationTime) {
            $response[] = (string) $this->NominationTime;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->SequenceNumeric) {
            $response[] = (string) $this->SequenceNumeric;
        }
        if ($this->TransportEquipment) {
            foreach ($this->TransportEquipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SupportedTransportEquipment) {
            foreach ($this->SupportedTransportEquipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->UnsupportedTransportEquipment) {
            foreach ($this->UnsupportedTransportEquipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CommodityClassification) {
            foreach ($this->CommodityClassification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SupportedCommodityClassification) {
            foreach ($this->SupportedCommodityClassification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->UnsupportedCommodityClassification) {
            foreach ($this->UnsupportedCommodityClassification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TotalCapacityDimension) {
            $response[] = (string) $this->TotalCapacityDimension;
        }
        if ($this->ShipmentStage) {
            foreach ($this->ShipmentStage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportEvent) {
            foreach ($this->TransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ResponsibleTransportServiceProviderParty) {
            $response[] = (string) $this->ResponsibleTransportServiceProviderParty;
        }
        if ($this->EnvironmentalEmission) {
            foreach ($this->EnvironmentalEmission as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->EstimatedDurationPeriod) {
            $response[] = (string) $this->EstimatedDurationPeriod;
        }
        if ($this->ScheduledServiceFrequency) {
            foreach ($this->ScheduledServiceFrequency as $elem) {
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
