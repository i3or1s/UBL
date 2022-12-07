<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AcceptanceTransportEvent;
use i3or1s\UBL\CAC\ActualArrivalTransportEvent;
use i3or1s\UBL\CAC\ActualDepartureTransportEvent;
use i3or1s\UBL\CAC\ActualPickupTransportEvent;
use i3or1s\UBL\CAC\ActualWaypointTransportEvent;
use i3or1s\UBL\CAC\AvailabilityTransportEvent;
use i3or1s\UBL\CAC\CarrierParty;
use i3or1s\UBL\CAC\CrewMemberPerson;
use i3or1s\UBL\CAC\CustomsAgentParty;
use i3or1s\UBL\CAC\DeliveryTransportEvent;
use i3or1s\UBL\CAC\DetentionTransportEvent;
use i3or1s\UBL\CAC\DischargeTransportEvent;
use i3or1s\UBL\CAC\DriverPerson;
use i3or1s\UBL\CAC\DropoffTransportEvent;
use i3or1s\UBL\CAC\EstimatedArrivalTransportEvent;
use i3or1s\UBL\CAC\EstimatedDepartureTransportEvent;
use i3or1s\UBL\CAC\EstimatedTransitPeriod;
use i3or1s\UBL\CAC\ExaminationTransportEvent;
use i3or1s\UBL\CAC\ExportationTransportEvent;
use i3or1s\UBL\CAC\FreightAllowanceCharge;
use i3or1s\UBL\CAC\FreightChargeLocation;
use i3or1s\UBL\CAC\LoadingPortLocation;
use i3or1s\UBL\CAC\LoadingTransportEvent;
use i3or1s\UBL\CAC\MasterPerson;
use i3or1s\UBL\CAC\OptionalTakeoverTransportEvent;
use i3or1s\UBL\CAC\PassengerPerson;
use i3or1s\UBL\CAC\PlannedArrivalTransportEvent;
use i3or1s\UBL\CAC\PlannedDepartureTransportEvent;
use i3or1s\UBL\CAC\PlannedWaypointTransportEvent;
use i3or1s\UBL\CAC\ReceiptTransportEvent;
use i3or1s\UBL\CAC\ReportingPerson;
use i3or1s\UBL\CAC\RequestedArrivalTransportEvent;
use i3or1s\UBL\CAC\RequestedDepartureTransportEvent;
use i3or1s\UBL\CAC\RequestedWaypointTransportEvent;
use i3or1s\UBL\CAC\SecurityOfficerPerson;
use i3or1s\UBL\CAC\ShipsSurgeonPerson;
use i3or1s\UBL\CAC\StorageTransportEvent;
use i3or1s\UBL\CAC\TakeoverTransportEvent;
use i3or1s\UBL\CAC\TerminalOperatorParty;
use i3or1s\UBL\CAC\TransitPeriod;
use i3or1s\UBL\CAC\TransportEvent;
use i3or1s\UBL\CAC\TransportMeans;
use i3or1s\UBL\CAC\TransshipPortLocation;
use i3or1s\UBL\CAC\UnloadingPortLocation;
use i3or1s\UBL\CAC\WarehousingTransportEvent;
use i3or1s\UBL\CBC\CrewQuantity;
use i3or1s\UBL\CBC\DemurrageInstructions;
use i3or1s\UBL\CBC\EstimatedDeliveryDate;
use i3or1s\UBL\CBC\EstimatedDeliveryTime;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Instructions;
use i3or1s\UBL\CBC\LoadingSequenceID;
use i3or1s\UBL\CBC\OnCarriageIndicator;
use i3or1s\UBL\CBC\PassengerQuantity;
use i3or1s\UBL\CBC\PreCarriageIndicator;
use i3or1s\UBL\CBC\RequiredDeliveryDate;
use i3or1s\UBL\CBC\RequiredDeliveryTime;
use i3or1s\UBL\CBC\SuccessiveSequenceID;
use i3or1s\UBL\CBC\TransitDirectionCode;
use i3or1s\UBL\CBC\TransportMeansTypeCode;
use i3or1s\UBL\CBC\TransportModeCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ShipmentStageType.html.
 */
abstract class ShipmentStageType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ShipmentStageType';

    public readonly ?ID $ID; // [0..1]    An identifier for this shipment stage.
    public readonly ?TransportModeCode $TransportModeCode; // [0..1]    A code signifying the method of transport used for this shipment stage.
    public readonly ?TransportMeansTypeCode $TransportMeansTypeCode; // [0..1]    A code signifying the kind of transport means (truck, vessel, etc.) used for this shipment stage.
    public readonly ?TransitDirectionCode $TransitDirectionCode; // [0..1]    A code signifying the direction of transit in this shipment stage.
    public readonly ?PreCarriageIndicator $PreCarriageIndicator; // [0..1]    An indicator that this stage takes place before the main carriage of the shipment (true) or not (false).
    public readonly ?OnCarriageIndicator $OnCarriageIndicator; // [0..1]    An indicator that this stage takes place after the main carriage of the shipment (true) or not (false).
    public readonly ?EstimatedDeliveryDate $EstimatedDeliveryDate; // [0..1]    The estimated date of delivery in this shipment stage.
    public readonly ?EstimatedDeliveryTime $EstimatedDeliveryTime; // [0..1]    The estimated time of delivery in this shipment stage.
    public readonly ?RequiredDeliveryDate $RequiredDeliveryDate; // [0..1]    The delivery date required by the buyer in this shipment stage.
    public readonly ?RequiredDeliveryTime $RequiredDeliveryTime; // [0..1]    The delivery time required by the buyer in this shipment stage.
    public readonly ?LoadingSequenceID $LoadingSequenceID; // [0..1]    An identifier for the loading sequence (of consignments) associated with this shipment stage.
    public readonly ?SuccessiveSequenceID $SuccessiveSequenceID; // [0..1]    Identifies the successive loading sequence (of consignments) associated with a shipment stage.
    /** @var Instructions[]|null */
    public readonly ?array $Instructions; // [0..*]    Text of instructions applicable to a shipment stage.
    /** @var DemurrageInstructions[]|null */
    public readonly ?array $DemurrageInstructions; // [0..*]    Text of instructions relating to demurrage (the case in which a vessel is prevented from loading or discharging cargo within the stipulated laytime).
    public readonly ?CrewQuantity $CrewQuantity; // [0..1]    The total number of crew aboard a transport means.
    public readonly ?PassengerQuantity $PassengerQuantity; // [0..1]    The total number of passengers aboard a transport means.
    public readonly ?TransitPeriod $TransitPeriod; // [0..1]    The period during which this shipment stage actually took place.
    /** @var CarrierParty[]|null */
    public readonly ?array $CarrierParty; // [0..*]    A carrier party responsible for this shipment stage.
    public readonly ?TransportMeans $TransportMeans; // [0..1]    The means of transport used in this shipment stage.
    public readonly ?LoadingPortLocation $LoadingPortLocation; // [0..1]    The location of loading for a shipment stage.
    public readonly ?UnloadingPortLocation $UnloadingPortLocation; // [0..1]    The location of unloading for a shipment stage.
    public readonly ?TransshipPortLocation $TransshipPortLocation; // [0..1]    The location of transshipment relating to a shipment stage.
    public readonly ?LoadingTransportEvent $LoadingTransportEvent; // [0..1]    The loading of goods in this shipment stage.
    public readonly ?ExaminationTransportEvent $ExaminationTransportEvent; // [0..1]    The examination of shipments in this shipment stage.
    public readonly ?AvailabilityTransportEvent $AvailabilityTransportEvent; // [0..1]    The making available of shipments in this shipment stage.
    public readonly ?ExportationTransportEvent $ExportationTransportEvent; // [0..1]    The export event associated with this shipment stage.
    public readonly ?DischargeTransportEvent $DischargeTransportEvent; // [0..1]    The discharge event associated with this shipment stage.
    public readonly ?WarehousingTransportEvent $WarehousingTransportEvent; // [0..1]    The warehousing event associated with this shipment stage.
    public readonly ?TakeoverTransportEvent $TakeoverTransportEvent; // [0..1]    The receiver's takeover of the goods in this shipment stage.
    public readonly ?OptionalTakeoverTransportEvent $OptionalTakeoverTransportEvent; // [0..1]    The optional takeover of the goods in this shipment stage.
    public readonly ?DropoffTransportEvent $DropoffTransportEvent; // [0..1]    The dropping off of goods in this shipment stage.
    public readonly ?ActualPickupTransportEvent $ActualPickupTransportEvent; // [0..1]    The pickup of goods in this shipment stage.
    public readonly ?DeliveryTransportEvent $DeliveryTransportEvent; // [0..1]    The delivery of goods in this shipment stage.
    public readonly ?ReceiptTransportEvent $ReceiptTransportEvent; // [0..1]    The receipt of goods in this shipment stage.
    public readonly ?StorageTransportEvent $StorageTransportEvent; // [0..1]    The storage of goods in this shipment stage.
    public readonly ?AcceptanceTransportEvent $AcceptanceTransportEvent; // [0..1]    The acceptance of goods in this shipment stage.
    public readonly ?TerminalOperatorParty $TerminalOperatorParty; // [0..1]    A terminal operator associated with this shipment stage.
    public readonly ?CustomsAgentParty $CustomsAgentParty; // [0..1]    A customs agent associated with this shipment stage.
    public readonly ?EstimatedTransitPeriod $EstimatedTransitPeriod; // [0..1]    The estimated transit period of this shipment stage.
    /** @var FreightAllowanceCharge[]|null */
    public readonly ?array $FreightAllowanceCharge; // [0..*]    A freight allowance charge for this shipment stage.
    public readonly ?FreightChargeLocation $FreightChargeLocation; // [0..1]    The location associated with a freight charge related to this shipment stage.
    /** @var DetentionTransportEvent[]|null */
    public readonly ?array $DetentionTransportEvent; // [0..*]    The detention of a transport means during loading and unloading operations.
    public readonly ?RequestedDepartureTransportEvent $RequestedDepartureTransportEvent; // [0..1]    The departure requested by the party requesting a transportation service.
    public readonly ?RequestedArrivalTransportEvent $RequestedArrivalTransportEvent; // [0..1]    The arrival requested by the party requesting a transportation service.
    /** @var RequestedWaypointTransportEvent[]|null */
    public readonly ?array $RequestedWaypointTransportEvent; // [0..*]    A waypoint requested by the party requesting a transportation service.
    public readonly ?PlannedDepartureTransportEvent $PlannedDepartureTransportEvent; // [0..1]    The departure planned by the party providing a transportation service.
    public readonly ?PlannedArrivalTransportEvent $PlannedArrivalTransportEvent; // [0..1]    The arrival planned by the party providing a transportation service.
    /** @var PlannedWaypointTransportEvent[]|null */
    public readonly ?array $PlannedWaypointTransportEvent; // [0..*]    A waypoint planned by the party providing a transportation service.
    public readonly ?ActualDepartureTransportEvent $ActualDepartureTransportEvent; // [0..1]    The actual departure from a specific location during a transportation service.
    public readonly ?ActualWaypointTransportEvent $ActualWaypointTransportEvent; // [0..1]    The location of an actual waypoint during a transportation service.
    public readonly ?ActualArrivalTransportEvent $ActualArrivalTransportEvent; // [0..1]    The actual arrival at a specific location during a transportation service.
    /** @var TransportEvent[]|null */
    public readonly ?array $TransportEvent; // [0..*]    A significant occurrence in the course of this shipment of goods.
    public readonly ?EstimatedDepartureTransportEvent $EstimatedDepartureTransportEvent; // [0..1]    Describes an estimated departure at a location during a transport service.
    public readonly ?EstimatedArrivalTransportEvent $EstimatedArrivalTransportEvent; // [0..1]    Describes an estimated arrival at a location during a transport service.
    /** @var PassengerPerson[]|null */
    public readonly ?array $PassengerPerson; // [0..*]    A person who travels in a conveyance without participating in its operation.
    /** @var DriverPerson[]|null */
    public readonly ?array $DriverPerson; // [0..*]    Describes a person responsible for driving the transport means.
    public readonly ?ReportingPerson $ReportingPerson; // [0..1]    Describes a person being responsible for providing the required administrative reporting relating to a transport.
    /** @var CrewMemberPerson[]|null */
    public readonly ?array $CrewMemberPerson; // [0..*]    A person operating or serving aboard a transport means.
    public readonly ?SecurityOfficerPerson $SecurityOfficerPerson; // [0..1]    The person on board the vessel, accountable to the master, designated by the company as responsible for the security of the ship, including implementation and maintenance of the ship security plan and for the liaison with the company security officer and the port facility security officers.
    public readonly ?MasterPerson $MasterPerson; // [0..1]    The person responsible for the ship's safe and efficient operation, including cargo operations, navigation, crew management and for ensuring that the vessel complies with local and international laws, as well as company and flag state policies.
    public readonly ?ShipsSurgeonPerson $ShipsSurgeonPerson; // [0..1]    The person responsible for the health of the people aboard a ship at sea.

    /**
     * @param Instructions[]|null                    $Instructions
     * @param DemurrageInstructions[]|null           $DemurrageInstructions
     * @param CarrierParty[]|null                    $CarrierParty
     * @param FreightAllowanceCharge[]|null          $FreightAllowanceCharge
     * @param DetentionTransportEvent[]|null         $DetentionTransportEvent
     * @param RequestedWaypointTransportEvent[]|null $RequestedWaypointTransportEvent
     * @param PlannedWaypointTransportEvent[]|null   $PlannedWaypointTransportEvent
     * @param TransportEvent[]|null                  $TransportEvent
     * @param PassengerPerson[]|null                 $PassengerPerson
     * @param DriverPerson[]|null                    $DriverPerson
     * @param CrewMemberPerson[]|null                $CrewMemberPerson
     */
    public function __construct(?ID $ID, ?TransportModeCode $TransportModeCode, ?TransportMeansTypeCode $TransportMeansTypeCode, ?TransitDirectionCode $TransitDirectionCode, ?PreCarriageIndicator $PreCarriageIndicator, ?OnCarriageIndicator $OnCarriageIndicator, ?EstimatedDeliveryDate $EstimatedDeliveryDate, ?EstimatedDeliveryTime $EstimatedDeliveryTime, ?RequiredDeliveryDate $RequiredDeliveryDate, ?RequiredDeliveryTime $RequiredDeliveryTime, ?LoadingSequenceID $LoadingSequenceID, ?SuccessiveSequenceID $SuccessiveSequenceID, ?array $Instructions, ?array $DemurrageInstructions, ?CrewQuantity $CrewQuantity, ?PassengerQuantity $PassengerQuantity, ?TransitPeriod $TransitPeriod, ?array $CarrierParty, ?TransportMeans $TransportMeans, ?LoadingPortLocation $LoadingPortLocation, ?UnloadingPortLocation $UnloadingPortLocation, ?TransshipPortLocation $TransshipPortLocation, ?LoadingTransportEvent $LoadingTransportEvent, ?ExaminationTransportEvent $ExaminationTransportEvent, ?AvailabilityTransportEvent $AvailabilityTransportEvent, ?ExportationTransportEvent $ExportationTransportEvent, ?DischargeTransportEvent $DischargeTransportEvent, ?WarehousingTransportEvent $WarehousingTransportEvent, ?TakeoverTransportEvent $TakeoverTransportEvent, ?OptionalTakeoverTransportEvent $OptionalTakeoverTransportEvent, ?DropoffTransportEvent $DropoffTransportEvent, ?ActualPickupTransportEvent $ActualPickupTransportEvent, ?DeliveryTransportEvent $DeliveryTransportEvent, ?ReceiptTransportEvent $ReceiptTransportEvent, ?StorageTransportEvent $StorageTransportEvent, ?AcceptanceTransportEvent $AcceptanceTransportEvent, ?TerminalOperatorParty $TerminalOperatorParty, ?CustomsAgentParty $CustomsAgentParty, ?EstimatedTransitPeriod $EstimatedTransitPeriod, ?array $FreightAllowanceCharge, ?FreightChargeLocation $FreightChargeLocation, ?array $DetentionTransportEvent, ?RequestedDepartureTransportEvent $RequestedDepartureTransportEvent, ?RequestedArrivalTransportEvent $RequestedArrivalTransportEvent, ?array $RequestedWaypointTransportEvent, ?PlannedDepartureTransportEvent $PlannedDepartureTransportEvent, ?PlannedArrivalTransportEvent $PlannedArrivalTransportEvent, ?array $PlannedWaypointTransportEvent, ?ActualDepartureTransportEvent $ActualDepartureTransportEvent, ?ActualWaypointTransportEvent $ActualWaypointTransportEvent, ?ActualArrivalTransportEvent $ActualArrivalTransportEvent, ?array $TransportEvent, ?EstimatedDepartureTransportEvent $EstimatedDepartureTransportEvent, ?EstimatedArrivalTransportEvent $EstimatedArrivalTransportEvent, ?array $PassengerPerson, ?array $DriverPerson, ?ReportingPerson $ReportingPerson, ?array $CrewMemberPerson, ?SecurityOfficerPerson $SecurityOfficerPerson, ?MasterPerson $MasterPerson, ?ShipsSurgeonPerson $ShipsSurgeonPerson)
    {
        $this->ID = $ID;
        $this->TransportModeCode = $TransportModeCode;
        $this->TransportMeansTypeCode = $TransportMeansTypeCode;
        $this->TransitDirectionCode = $TransitDirectionCode;
        $this->PreCarriageIndicator = $PreCarriageIndicator;
        $this->OnCarriageIndicator = $OnCarriageIndicator;
        $this->EstimatedDeliveryDate = $EstimatedDeliveryDate;
        $this->EstimatedDeliveryTime = $EstimatedDeliveryTime;
        $this->RequiredDeliveryDate = $RequiredDeliveryDate;
        $this->RequiredDeliveryTime = $RequiredDeliveryTime;
        $this->LoadingSequenceID = $LoadingSequenceID;
        $this->SuccessiveSequenceID = $SuccessiveSequenceID;
        $this->Instructions = $Instructions;
        $this->DemurrageInstructions = $DemurrageInstructions;
        $this->CrewQuantity = $CrewQuantity;
        $this->PassengerQuantity = $PassengerQuantity;
        $this->TransitPeriod = $TransitPeriod;
        $this->CarrierParty = $CarrierParty;
        $this->TransportMeans = $TransportMeans;
        $this->LoadingPortLocation = $LoadingPortLocation;
        $this->UnloadingPortLocation = $UnloadingPortLocation;
        $this->TransshipPortLocation = $TransshipPortLocation;
        $this->LoadingTransportEvent = $LoadingTransportEvent;
        $this->ExaminationTransportEvent = $ExaminationTransportEvent;
        $this->AvailabilityTransportEvent = $AvailabilityTransportEvent;
        $this->ExportationTransportEvent = $ExportationTransportEvent;
        $this->DischargeTransportEvent = $DischargeTransportEvent;
        $this->WarehousingTransportEvent = $WarehousingTransportEvent;
        $this->TakeoverTransportEvent = $TakeoverTransportEvent;
        $this->OptionalTakeoverTransportEvent = $OptionalTakeoverTransportEvent;
        $this->DropoffTransportEvent = $DropoffTransportEvent;
        $this->ActualPickupTransportEvent = $ActualPickupTransportEvent;
        $this->DeliveryTransportEvent = $DeliveryTransportEvent;
        $this->ReceiptTransportEvent = $ReceiptTransportEvent;
        $this->StorageTransportEvent = $StorageTransportEvent;
        $this->AcceptanceTransportEvent = $AcceptanceTransportEvent;
        $this->TerminalOperatorParty = $TerminalOperatorParty;
        $this->CustomsAgentParty = $CustomsAgentParty;
        $this->EstimatedTransitPeriod = $EstimatedTransitPeriod;
        $this->FreightAllowanceCharge = $FreightAllowanceCharge;
        $this->FreightChargeLocation = $FreightChargeLocation;
        $this->DetentionTransportEvent = $DetentionTransportEvent;
        $this->RequestedDepartureTransportEvent = $RequestedDepartureTransportEvent;
        $this->RequestedArrivalTransportEvent = $RequestedArrivalTransportEvent;
        $this->RequestedWaypointTransportEvent = $RequestedWaypointTransportEvent;
        $this->PlannedDepartureTransportEvent = $PlannedDepartureTransportEvent;
        $this->PlannedArrivalTransportEvent = $PlannedArrivalTransportEvent;
        $this->PlannedWaypointTransportEvent = $PlannedWaypointTransportEvent;
        $this->ActualDepartureTransportEvent = $ActualDepartureTransportEvent;
        $this->ActualWaypointTransportEvent = $ActualWaypointTransportEvent;
        $this->ActualArrivalTransportEvent = $ActualArrivalTransportEvent;
        $this->TransportEvent = $TransportEvent;
        $this->EstimatedDepartureTransportEvent = $EstimatedDepartureTransportEvent;
        $this->EstimatedArrivalTransportEvent = $EstimatedArrivalTransportEvent;
        $this->PassengerPerson = $PassengerPerson;
        $this->DriverPerson = $DriverPerson;
        $this->ReportingPerson = $ReportingPerson;
        $this->CrewMemberPerson = $CrewMemberPerson;
        $this->SecurityOfficerPerson = $SecurityOfficerPerson;
        $this->MasterPerson = $MasterPerson;
        $this->ShipsSurgeonPerson = $ShipsSurgeonPerson;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->TransportModeCode) {
            $response[] = (string) $this->TransportModeCode;
        }
        if ($this->TransportMeansTypeCode) {
            $response[] = (string) $this->TransportMeansTypeCode;
        }
        if ($this->TransitDirectionCode) {
            $response[] = (string) $this->TransitDirectionCode;
        }
        if ($this->PreCarriageIndicator) {
            $response[] = (string) $this->PreCarriageIndicator;
        }
        if ($this->OnCarriageIndicator) {
            $response[] = (string) $this->OnCarriageIndicator;
        }
        if ($this->EstimatedDeliveryDate) {
            $response[] = (string) $this->EstimatedDeliveryDate;
        }
        if ($this->EstimatedDeliveryTime) {
            $response[] = (string) $this->EstimatedDeliveryTime;
        }
        if ($this->RequiredDeliveryDate) {
            $response[] = (string) $this->RequiredDeliveryDate;
        }
        if ($this->RequiredDeliveryTime) {
            $response[] = (string) $this->RequiredDeliveryTime;
        }
        if ($this->LoadingSequenceID) {
            $response[] = (string) $this->LoadingSequenceID;
        }
        if ($this->SuccessiveSequenceID) {
            $response[] = (string) $this->SuccessiveSequenceID;
        }
        if ($this->Instructions) {
            foreach ($this->Instructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DemurrageInstructions) {
            foreach ($this->DemurrageInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CrewQuantity) {
            $response[] = (string) $this->CrewQuantity;
        }
        if ($this->PassengerQuantity) {
            $response[] = (string) $this->PassengerQuantity;
        }
        if ($this->TransitPeriod) {
            $response[] = (string) $this->TransitPeriod;
        }
        if ($this->CarrierParty) {
            foreach ($this->CarrierParty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportMeans) {
            $response[] = (string) $this->TransportMeans;
        }
        if ($this->LoadingPortLocation) {
            $response[] = (string) $this->LoadingPortLocation;
        }
        if ($this->UnloadingPortLocation) {
            $response[] = (string) $this->UnloadingPortLocation;
        }
        if ($this->TransshipPortLocation) {
            $response[] = (string) $this->TransshipPortLocation;
        }
        if ($this->LoadingTransportEvent) {
            $response[] = (string) $this->LoadingTransportEvent;
        }
        if ($this->ExaminationTransportEvent) {
            $response[] = (string) $this->ExaminationTransportEvent;
        }
        if ($this->AvailabilityTransportEvent) {
            $response[] = (string) $this->AvailabilityTransportEvent;
        }
        if ($this->ExportationTransportEvent) {
            $response[] = (string) $this->ExportationTransportEvent;
        }
        if ($this->DischargeTransportEvent) {
            $response[] = (string) $this->DischargeTransportEvent;
        }
        if ($this->WarehousingTransportEvent) {
            $response[] = (string) $this->WarehousingTransportEvent;
        }
        if ($this->TakeoverTransportEvent) {
            $response[] = (string) $this->TakeoverTransportEvent;
        }
        if ($this->OptionalTakeoverTransportEvent) {
            $response[] = (string) $this->OptionalTakeoverTransportEvent;
        }
        if ($this->DropoffTransportEvent) {
            $response[] = (string) $this->DropoffTransportEvent;
        }
        if ($this->ActualPickupTransportEvent) {
            $response[] = (string) $this->ActualPickupTransportEvent;
        }
        if ($this->DeliveryTransportEvent) {
            $response[] = (string) $this->DeliveryTransportEvent;
        }
        if ($this->ReceiptTransportEvent) {
            $response[] = (string) $this->ReceiptTransportEvent;
        }
        if ($this->StorageTransportEvent) {
            $response[] = (string) $this->StorageTransportEvent;
        }
        if ($this->AcceptanceTransportEvent) {
            $response[] = (string) $this->AcceptanceTransportEvent;
        }
        if ($this->TerminalOperatorParty) {
            $response[] = (string) $this->TerminalOperatorParty;
        }
        if ($this->CustomsAgentParty) {
            $response[] = (string) $this->CustomsAgentParty;
        }
        if ($this->EstimatedTransitPeriod) {
            $response[] = (string) $this->EstimatedTransitPeriod;
        }
        if ($this->FreightAllowanceCharge) {
            foreach ($this->FreightAllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FreightChargeLocation) {
            $response[] = (string) $this->FreightChargeLocation;
        }
        if ($this->DetentionTransportEvent) {
            foreach ($this->DetentionTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->RequestedDepartureTransportEvent) {
            $response[] = (string) $this->RequestedDepartureTransportEvent;
        }
        if ($this->RequestedArrivalTransportEvent) {
            $response[] = (string) $this->RequestedArrivalTransportEvent;
        }
        if ($this->RequestedWaypointTransportEvent) {
            foreach ($this->RequestedWaypointTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PlannedDepartureTransportEvent) {
            $response[] = (string) $this->PlannedDepartureTransportEvent;
        }
        if ($this->PlannedArrivalTransportEvent) {
            $response[] = (string) $this->PlannedArrivalTransportEvent;
        }
        if ($this->PlannedWaypointTransportEvent) {
            foreach ($this->PlannedWaypointTransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ActualDepartureTransportEvent) {
            $response[] = (string) $this->ActualDepartureTransportEvent;
        }
        if ($this->ActualWaypointTransportEvent) {
            $response[] = (string) $this->ActualWaypointTransportEvent;
        }
        if ($this->ActualArrivalTransportEvent) {
            $response[] = (string) $this->ActualArrivalTransportEvent;
        }
        if ($this->TransportEvent) {
            foreach ($this->TransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->EstimatedDepartureTransportEvent) {
            $response[] = (string) $this->EstimatedDepartureTransportEvent;
        }
        if ($this->EstimatedArrivalTransportEvent) {
            $response[] = (string) $this->EstimatedArrivalTransportEvent;
        }
        if ($this->PassengerPerson) {
            foreach ($this->PassengerPerson as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DriverPerson) {
            foreach ($this->DriverPerson as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReportingPerson) {
            $response[] = (string) $this->ReportingPerson;
        }
        if ($this->CrewMemberPerson) {
            foreach ($this->CrewMemberPerson as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SecurityOfficerPerson) {
            $response[] = (string) $this->SecurityOfficerPerson;
        }
        if ($this->MasterPerson) {
            $response[] = (string) $this->MasterPerson;
        }
        if ($this->ShipsSurgeonPerson) {
            $response[] = (string) $this->ShipsSurgeonPerson;
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
