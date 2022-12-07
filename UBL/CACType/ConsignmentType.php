<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\BillOfLadingHolderParty;
use i3or1s\UBL\CAC\CarrierParty;
use i3or1s\UBL\CAC\ChildConsignment;
use i3or1s\UBL\CAC\CollectPaymentTerms;
use i3or1s\UBL\CAC\ConsigneeParty;
use i3or1s\UBL\CAC\ConsignorParty;
use i3or1s\UBL\CAC\ConsolidatedShipment;
use i3or1s\UBL\CAC\CustomsDeclaration;
use i3or1s\UBL\CAC\DeliveryTerms;
use i3or1s\UBL\CAC\DisbursementPaymentTerms;
use i3or1s\UBL\CAC\ExporterParty;
use i3or1s\UBL\CAC\ExtraAllowanceCharge;
use i3or1s\UBL\CAC\FinalDeliveryParty;
use i3or1s\UBL\CAC\FinalDeliveryTransportationService;
use i3or1s\UBL\CAC\FinalDestinationCountry;
use i3or1s\UBL\CAC\FirstArrivalPortLocation;
use i3or1s\UBL\CAC\FreightAllowanceCharge;
use i3or1s\UBL\CAC\FreightForwarderParty;
use i3or1s\UBL\CAC\HazardousItemNotificationParty;
use i3or1s\UBL\CAC\ImporterParty;
use i3or1s\UBL\CAC\InsuranceParty;
use i3or1s\UBL\CAC\LastExitPortLocation;
use i3or1s\UBL\CAC\LogisticsOperatorParty;
use i3or1s\UBL\CAC\MainCarriageShipmentStage;
use i3or1s\UBL\CAC\MortgageHolderParty;
use i3or1s\UBL\CAC\NotifyParty;
use i3or1s\UBL\CAC\OnCarriageShipmentStage;
use i3or1s\UBL\CAC\OriginalDepartureCountry;
use i3or1s\UBL\CAC\OriginalDespatchParty;
use i3or1s\UBL\CAC\OriginalDespatchTransportationService;
use i3or1s\UBL\CAC\PaymentTerms;
use i3or1s\UBL\CAC\PerformingCarrierParty;
use i3or1s\UBL\CAC\PlannedDeliveryTransportEvent;
use i3or1s\UBL\CAC\PlannedPickupTransportEvent;
use i3or1s\UBL\CAC\PreCarriageShipmentStage;
use i3or1s\UBL\CAC\PrepaidPaymentTerms;
use i3or1s\UBL\CAC\RequestedDeliveryTransportEvent;
use i3or1s\UBL\CAC\RequestedPickupTransportEvent;
use i3or1s\UBL\CAC\Status;
use i3or1s\UBL\CAC\SubstituteCarrierParty;
use i3or1s\UBL\CAC\TransitCountry;
use i3or1s\UBL\CAC\TransportAdvisorParty;
use i3or1s\UBL\CAC\TransportContract;
use i3or1s\UBL\CAC\TransportEvent;
use i3or1s\UBL\CAC\TransportHandlingUnit;
use i3or1s\UBL\CBC\AnimalFoodIndicator;
use i3or1s\UBL\CBC\BrokerAssignedID;
use i3or1s\UBL\CBC\BulkCargoIndicator;
use i3or1s\UBL\CBC\CarrierAssignedID;
use i3or1s\UBL\CBC\CarrierServiceInstructions;
use i3or1s\UBL\CBC\ChargeableWeightMeasure;
use i3or1s\UBL\CBC\ChildConsignmentQuantity;
use i3or1s\UBL\CBC\ConsigneeAssignedID;
use i3or1s\UBL\CBC\ConsignmentQuantity;
use i3or1s\UBL\CBC\ConsignorAssignedID;
use i3or1s\UBL\CBC\ConsolidatableIndicator;
use i3or1s\UBL\CBC\ContainerizedIndicator;
use i3or1s\UBL\CBC\ContractedCarrierAssignedID;
use i3or1s\UBL\CBC\CustomsClearanceServiceInstructions;
use i3or1s\UBL\CBC\DeclaredCustomsValueAmount;
use i3or1s\UBL\CBC\DeclaredForCarriageValueAmount;
use i3or1s\UBL\CBC\DeclaredStatisticsValueAmount;
use i3or1s\UBL\CBC\DeliveryInstructions;
use i3or1s\UBL\CBC\ForwarderServiceInstructions;
use i3or1s\UBL\CBC\FreeOnBoardValueAmount;
use i3or1s\UBL\CBC\FreightForwarderAssignedID;
use i3or1s\UBL\CBC\GeneralCargoIndicator;
use i3or1s\UBL\CBC\GrossVolumeMeasure;
use i3or1s\UBL\CBC\GrossWeightMeasure;
use i3or1s\UBL\CBC\HandlingCode;
use i3or1s\UBL\CBC\HandlingInstructions;
use i3or1s\UBL\CBC\HaulageInstructions;
use i3or1s\UBL\CBC\HazardousRiskIndicator;
use i3or1s\UBL\CBC\HumanFoodIndicator;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Information;
use i3or1s\UBL\CBC\InsurancePremiumAmount;
use i3or1s\UBL\CBC\InsuranceValueAmount;
use i3or1s\UBL\CBC\LivestockIndicator;
use i3or1s\UBL\CBC\LoadingLengthMeasure;
use i3or1s\UBL\CBC\LoadingSequenceID;
use i3or1s\UBL\CBC\NetNetWeightMeasure;
use i3or1s\UBL\CBC\NetVolumeMeasure;
use i3or1s\UBL\CBC\NetWeightMeasure;
use i3or1s\UBL\CBC\PerformingCarrierAssignedID;
use i3or1s\UBL\CBC\Remarks;
use i3or1s\UBL\CBC\SequenceID;
use i3or1s\UBL\CBC\ShippingPriorityLevelCode;
use i3or1s\UBL\CBC\SpecialInstructions;
use i3or1s\UBL\CBC\SpecialSecurityIndicator;
use i3or1s\UBL\CBC\SpecialServiceInstructions;
use i3or1s\UBL\CBC\SplitConsignmentIndicator;
use i3or1s\UBL\CBC\SummaryDescription;
use i3or1s\UBL\CBC\TariffCode;
use i3or1s\UBL\CBC\TariffDescription;
use i3or1s\UBL\CBC\ThirdPartyPayerIndicator;
use i3or1s\UBL\CBC\TotalGoodsItemQuantity;
use i3or1s\UBL\CBC\TotalInvoiceAmount;
use i3or1s\UBL\CBC\TotalPackagesQuantity;
use i3or1s\UBL\CBC\TotalTransportHandlingUnitQuantity;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ConsignmentType.html.
 */
abstract class ConsignmentType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ConsignmentType';

    public readonly ID $ID; // [1..1]    An identifier assigned to a collection of goods for both import and export.
    public readonly ?CarrierAssignedID $CarrierAssignedID; // [0..1]    An identifier for this consignment, assigned by the carrier.
    public readonly ?ConsigneeAssignedID $ConsigneeAssignedID; // [0..1]    An identifier for this consignment, assigned by the consignee.
    public readonly ?ConsignorAssignedID $ConsignorAssignedID; // [0..1]    An identifier for this consignment, assigned by the consignor.
    public readonly ?FreightForwarderAssignedID $FreightForwarderAssignedID; // [0..1]    An identifier for this consignment, assigned by the freight forwarder.
    public readonly ?BrokerAssignedID $BrokerAssignedID; // [0..1]    An identifier for this consignment, assigned by the broker.
    public readonly ?ContractedCarrierAssignedID $ContractedCarrierAssignedID; // [0..1]    An identifier for this consignment, assigned by the contracted carrier.
    public readonly ?PerformingCarrierAssignedID $PerformingCarrierAssignedID; // [0..1]    An identifier for this consignment, assigned by the performing carrier.
    /** @var SummaryDescription[]|null */
    public readonly ?array $SummaryDescription; // [0..*]    A textual summary description of the consignment.
    public readonly ?TotalInvoiceAmount $TotalInvoiceAmount; // [0..1]    The total of all invoice amounts declared in this consignment.
    public readonly ?DeclaredCustomsValueAmount $DeclaredCustomsValueAmount; // [0..1]    The total declared value for customs purposes of all the goods in this consignment, regardless of whether they are subject to the same customs procedure, tariff/statistical categorization, country information, or duty regime.
    /** @var TariffDescription[]|null */
    public readonly ?array $TariffDescription; // [0..*]    Text describing the tariff applied to this consignment.
    public readonly ?TariffCode $TariffCode; // [0..1]    A code signifying the tariff applied to this consignment.
    public readonly ?InsurancePremiumAmount $InsurancePremiumAmount; // [0..1]    The amount of the premium payable to an insurance company for insuring the goods contained in this consignment.
    public readonly ?GrossWeightMeasure $GrossWeightMeasure; // [0..1]    The total declared weight of the goods in this consignment, including packaging but excluding the carrier's equipment.
    public readonly ?NetWeightMeasure $NetWeightMeasure; // [0..1]    The total net weight of all the goods items referred to as one consignment.
    public readonly ?NetNetWeightMeasure $NetNetWeightMeasure; // [0..1]    The total net weight of the goods in this consignment, exclusive of packaging.
    public readonly ?ChargeableWeightMeasure $ChargeableWeightMeasure; // [0..1]    The weight upon which a charge is to be based.
    public readonly ?GrossVolumeMeasure $GrossVolumeMeasure; // [0..1]    The total volume of the goods referred to as one consignment.
    public readonly ?NetVolumeMeasure $NetVolumeMeasure; // [0..1]    The total net volume of all goods items referred to as one consignment.
    public readonly ?LoadingLengthMeasure $LoadingLengthMeasure; // [0..1]    The total length in a means of transport or a piece of transport equipment which, given the width and height of the transport means, will accommodate all of the consignments in a single consolidation.
    /** @var Remarks[]|null */
    public readonly ?array $Remarks; // [0..*]    Remarks concerning the complete consignment, to be printed on the transport document.
    public readonly ?HazardousRiskIndicator $HazardousRiskIndicator; // [0..1]    An indication that the transported goods in this consignment are subject to an international regulation concerning the carriage of dangerous goods (true) or not (false).
    public readonly ?AnimalFoodIndicator $AnimalFoodIndicator; // [0..1]    An indication that the transported goods in this consignment are animal foodstuffs (true) or not (false).
    public readonly ?HumanFoodIndicator $HumanFoodIndicator; // [0..1]    An indication that the transported goods in this consignment are for human consumption (true) or not (false).
    public readonly ?LivestockIndicator $LivestockIndicator; // [0..1]    An indication that the transported goods are livestock (true) or not (false).
    public readonly ?BulkCargoIndicator $BulkCargoIndicator; // [0..1]    An indication that the transported goods in this consignment are bulk cargoes (true) or not (false).
    public readonly ?ContainerizedIndicator $ContainerizedIndicator; // [0..1]    An indication that the transported goods in this consignment are containerized cargoes (true) or not (false).
    public readonly ?GeneralCargoIndicator $GeneralCargoIndicator; // [0..1]    An indication that the transported goods in this consignment are general cargoes (true) or not (false).
    public readonly ?SpecialSecurityIndicator $SpecialSecurityIndicator; // [0..1]    An indication that the transported goods in this consignment require special security (true) or not (false).
    public readonly ?ThirdPartyPayerIndicator $ThirdPartyPayerIndicator; // [0..1]    An indication that this consignment will be paid for by a third party (true) or not (false).
    /** @var CarrierServiceInstructions[]|null */
    public readonly ?array $CarrierServiceInstructions; // [0..*]    Service instructions to the carrier, expressed as text.
    /** @var CustomsClearanceServiceInstructions[]|null */
    public readonly ?array $CustomsClearanceServiceInstructions; // [0..*]    Service instructions for customs clearance, expressed as text.
    /** @var ForwarderServiceInstructions[]|null */
    public readonly ?array $ForwarderServiceInstructions; // [0..*]    Service instructions for the forwarder, expressed as text.
    /** @var SpecialServiceInstructions[]|null */
    public readonly ?array $SpecialServiceInstructions; // [0..*]    Special service instructions, expressed as text.
    public readonly ?SequenceID $SequenceID; // [0..1]    A sequence identifier for this consignment.
    public readonly ?ShippingPriorityLevelCode $ShippingPriorityLevelCode; // [0..1]    A code signifying the priority or level of service required for this consignment.
    public readonly ?HandlingCode $HandlingCode; // [0..1]    The handling required for this consignment, expressed as a code.
    /** @var HandlingInstructions[]|null */
    public readonly ?array $HandlingInstructions; // [0..*]    The handling required for this consignment, expressed as text.
    /** @var Information[]|null */
    public readonly ?array $Information; // [0..*]    Free-form text pertinent to this consignment, conveying information that is not contained explicitly in other structures.
    public readonly ?TotalGoodsItemQuantity $TotalGoodsItemQuantity; // [0..1]    The total number of goods items in this consignment.
    public readonly ?TotalTransportHandlingUnitQuantity $TotalTransportHandlingUnitQuantity; // [0..1]    The number of pieces of transport handling equipment (pallets, boxes, cases, etc.) in this consignment.
    public readonly ?InsuranceValueAmount $InsuranceValueAmount; // [0..1]    The amount covered by insurance for this consignment.
    public readonly ?DeclaredForCarriageValueAmount $DeclaredForCarriageValueAmount; // [0..1]    The value of this consignment, declared by the shipper or his agent solely for the purpose of varying the carrier's level of liability from that provided in the contract of carriage, in case of loss or damage to goods or delayed delivery.
    public readonly ?DeclaredStatisticsValueAmount $DeclaredStatisticsValueAmount; // [0..1]    The value, declared for statistical purposes, of those goods in this consignment that have the same statistical heading.
    public readonly ?FreeOnBoardValueAmount $FreeOnBoardValueAmount; // [0..1]    The monetary amount that has to be or has been paid as calculated under the applicable trade delivery.
    /** @var SpecialInstructions[]|null */
    public readonly ?array $SpecialInstructions; // [0..*]    Special instructions relating to this consignment.
    public readonly ?SplitConsignmentIndicator $SplitConsignmentIndicator; // [0..1]    An indicator that this consignment has been split in transit (true) or not (false).
    /** @var DeliveryInstructions[]|null */
    public readonly ?array $DeliveryInstructions; // [0..*]    A set of delivery instructions relating to this consignment.
    public readonly ?ConsignmentQuantity $ConsignmentQuantity; // [0..1]    The count in this consignment considering goods items, child consignments, shipments
    public readonly ?ConsolidatableIndicator $ConsolidatableIndicator; // [0..1]    An indicator that this consignment can be consolidated (true) or not (false).
    /** @var HaulageInstructions[]|null */
    public readonly ?array $HaulageInstructions; // [0..*]    Instructions regarding haulage of this consignment, expressed as text.
    public readonly ?LoadingSequenceID $LoadingSequenceID; // [0..1]    An identifier for the loading sequence of this consignment.
    public readonly ?ChildConsignmentQuantity $ChildConsignmentQuantity; // [0..1]    The quantity of (consolidated) child consignments
    public readonly ?TotalPackagesQuantity $TotalPackagesQuantity; // [0..1]    The total number of packages associated with a Consignment.
    /** @var ConsolidatedShipment[]|null */
    public readonly ?array $ConsolidatedShipment; // [0..*]    A consolidated shipment (a shipment created by an act of consolidation).
    /** @var CustomsDeclaration[]|null */
    public readonly ?array $CustomsDeclaration; // [0..*]    A class describing identifiers or references relating to customs procedures.
    public readonly ?RequestedPickupTransportEvent $RequestedPickupTransportEvent; // [0..1]    The pickup of this consignment requested by the party requesting a transportation service (the transport user).
    public readonly ?RequestedDeliveryTransportEvent $RequestedDeliveryTransportEvent; // [0..1]    The delivery of this consignment requested by the party requesting a transportation service (the transport user).
    public readonly ?PlannedPickupTransportEvent $PlannedPickupTransportEvent; // [0..1]    The pickup of this consignment planned by the party responsible for providing the transportation service (the transport service provider).
    public readonly ?PlannedDeliveryTransportEvent $PlannedDeliveryTransportEvent; // [0..1]    The delivery of this consignment planned by the party responsible for providing the transportation service (the transport service provider).
    /** @var Status[]|null */
    public readonly ?array $Status; // [0..*]    The status of a particular condition associated with this consignment.
    /** @var ChildConsignment[]|null */
    public readonly ?array $ChildConsignment; // [0..*]    One of the child consignments of which a consolidated consignment is composed.
    public readonly ?ConsigneeParty $ConsigneeParty; // [0..1]    A party to which goods are consigned.
    public readonly ?ExporterParty $ExporterParty; // [0..1]    The party that makes the export declaration, or on behalf of which the export declaration is made, and that is the owner of the goods in this consignment or has similar right of disposal over them at the time when the declaration is accepted.
    public readonly ?ConsignorParty $ConsignorParty; // [0..1]    The party consigning goods, as stipulated in the transport contract by the party ordering transport.
    public readonly ?ImporterParty $ImporterParty; // [0..1]    The party that makes an import declaration regarding this consignment, or on behalf of which a customs clearing agent or other authorized person makes an import declaration regarding this consignment. This may include a person who has possession of the goods or to whom the goods are consigned.
    public readonly ?CarrierParty $CarrierParty; // [0..1]    The party providing the transport of goods in this consignment between named points.
    public readonly ?FreightForwarderParty $FreightForwarderParty; // [0..1]    The party combining individual smaller consignments into a single larger shipment (the consolidated shipment), which is sent to a counterpart that mirrors the consolidator's activity by dividing the consolidated consignment into its original components.
    public readonly ?NotifyParty $NotifyParty; // [0..1]    The party to be notified upon arrival of goods and when special occurrences (usually pre-defined) take place during a transportation service.
    public readonly ?OriginalDespatchParty $OriginalDespatchParty; // [0..1]    The original despatch (sender) party for this consignment.
    public readonly ?FinalDeliveryParty $FinalDeliveryParty; // [0..1]    The final delivery party for this consignment.
    public readonly ?PerformingCarrierParty $PerformingCarrierParty; // [0..1]    The party performing the carriage of this consignment.
    public readonly ?SubstituteCarrierParty $SubstituteCarrierParty; // [0..1]    A substitute party performing the carriage of this consignment.
    public readonly ?LogisticsOperatorParty $LogisticsOperatorParty; // [0..1]    The logistics operator party for this consignment.
    public readonly ?TransportAdvisorParty $TransportAdvisorParty; // [0..1]    The party providing transport advice this consignment.
    public readonly ?HazardousItemNotificationParty $HazardousItemNotificationParty; // [0..1]    The party that would be notified of a hazardous item in this consignment.
    public readonly ?InsuranceParty $InsuranceParty; // [0..1]    The party holding the insurance for this consignment.
    public readonly ?MortgageHolderParty $MortgageHolderParty; // [0..1]    The party holding the mortgage for this consignment.
    public readonly ?BillOfLadingHolderParty $BillOfLadingHolderParty; // [0..1]    The party holding the bill of lading for this consignment.
    public readonly ?OriginalDepartureCountry $OriginalDepartureCountry; // [0..1]    The country from which the goods in this consignment were originally exported, without any commercial transaction taking place in intermediate countries.
    public readonly ?FinalDestinationCountry $FinalDestinationCountry; // [0..1]    The country in which the goods in this consignment are to be delivered to the final consignee or buyer.
    /** @var TransitCountry[]|null */
    public readonly ?array $TransitCountry; // [0..*]    One of the countries through which goods or passengers in this consignment are routed between the country of original departure and the country of final destination.
    public readonly ?TransportContract $TransportContract; // [0..1]    A transport contract relating to this consignment.
    /** @var TransportEvent[]|null */
    public readonly ?array $TransportEvent; // [0..*]    A class describing a significant occurrence or happening related to the transportation of goods.
    public readonly ?OriginalDespatchTransportationService $OriginalDespatchTransportationService; // [0..1]    The service for pickup from the consignor under the transport contract for this consignment.
    public readonly ?FinalDeliveryTransportationService $FinalDeliveryTransportationService; // [0..1]    The service for delivery to the consignee under the transport contract for this consignment.
    public readonly ?DeliveryTerms $DeliveryTerms; // [0..1]    The conditions agreed upon between a seller and a buyer with regard to the delivery of goods and/or services (e.g., CIF, FOB, or EXW from the INCOTERMS Terms of Delivery).
    public readonly ?PaymentTerms $PaymentTerms; // [0..1]    The terms of payment between the parties (such as logistics service client, logistics service provider) in a transaction.
    public readonly ?CollectPaymentTerms $CollectPaymentTerms; // [0..1]    The terms of payment that apply to the collection of this consignment.
    public readonly ?DisbursementPaymentTerms $DisbursementPaymentTerms; // [0..1]    The terms of payment for disbursement.
    public readonly ?PrepaidPaymentTerms $PrepaidPaymentTerms; // [0..1]    The terms of payment for prepayment.
    /** @var FreightAllowanceCharge[]|null */
    public readonly ?array $FreightAllowanceCharge; // [0..*]    A cost incurred by the shipper in moving goods, by whatever means, from one place to another under the terms of the contract of carriage for this consignment. In addition to transport costs, this may include such elements as packing, documentation, loading, unloading, and insurance to the extent that they relate to the freight costs.
    /** @var ExtraAllowanceCharge[]|null */
    public readonly ?array $ExtraAllowanceCharge; // [0..*]    A charge for extra allowance.
    /** @var MainCarriageShipmentStage[]|null */
    public readonly ?array $MainCarriageShipmentStage; // [0..*]    A shipment stage during main carriage.
    /** @var PreCarriageShipmentStage[]|null */
    public readonly ?array $PreCarriageShipmentStage; // [0..*]    A shipment stage during precarriage (usually refers to movement activity that takes place prior to the container being loaded at a port of loading).
    /** @var OnCarriageShipmentStage[]|null */
    public readonly ?array $OnCarriageShipmentStage; // [0..*]    A shipment stage during on-carriage (usually refers to movement activity that takes place after the container is discharged at a port of discharge).
    /** @var TransportHandlingUnit[]|null */
    public readonly ?array $TransportHandlingUnit; // [0..*]    A transport handling unit used for loose and containerized goods.
    public readonly ?FirstArrivalPortLocation $FirstArrivalPortLocation; // [0..1]    The first arrival location in a transport. This would be a port for sea, an airport for air, a terminal for rail, or a border post for land crossing.
    public readonly ?LastExitPortLocation $LastExitPortLocation; // [0..1]    The final exporting location in a transport. This would be a port for sea, an airport for air, a terminal for rail, or a border post for land crossing.

    /**
     * @param SummaryDescription[]|null                  $SummaryDescription
     * @param TariffDescription[]|null                   $TariffDescription
     * @param Remarks[]|null                             $Remarks
     * @param CarrierServiceInstructions[]|null          $CarrierServiceInstructions
     * @param CustomsClearanceServiceInstructions[]|null $CustomsClearanceServiceInstructions
     * @param ForwarderServiceInstructions[]|null        $ForwarderServiceInstructions
     * @param SpecialServiceInstructions[]|null          $SpecialServiceInstructions
     * @param HandlingInstructions[]|null                $HandlingInstructions
     * @param Information[]|null                         $Information
     * @param SpecialInstructions[]|null                 $SpecialInstructions
     * @param DeliveryInstructions[]|null                $DeliveryInstructions
     * @param HaulageInstructions[]|null                 $HaulageInstructions
     * @param ConsolidatedShipment[]|null                $ConsolidatedShipment
     * @param CustomsDeclaration[]|null                  $CustomsDeclaration
     * @param Status[]|null                              $Status
     * @param ChildConsignment[]|null                    $ChildConsignment
     * @param TransitCountry[]|null                      $TransitCountry
     * @param TransportEvent[]|null                      $TransportEvent
     * @param FreightAllowanceCharge[]|null              $FreightAllowanceCharge
     * @param ExtraAllowanceCharge[]|null                $ExtraAllowanceCharge
     * @param MainCarriageShipmentStage[]|null           $MainCarriageShipmentStage
     * @param PreCarriageShipmentStage[]|null            $PreCarriageShipmentStage
     * @param OnCarriageShipmentStage[]|null             $OnCarriageShipmentStage
     * @param TransportHandlingUnit[]|null               $TransportHandlingUnit
     */
    public function __construct(ID $ID, ?CarrierAssignedID $CarrierAssignedID, ?ConsigneeAssignedID $ConsigneeAssignedID, ?ConsignorAssignedID $ConsignorAssignedID, ?FreightForwarderAssignedID $FreightForwarderAssignedID, ?BrokerAssignedID $BrokerAssignedID, ?ContractedCarrierAssignedID $ContractedCarrierAssignedID, ?PerformingCarrierAssignedID $PerformingCarrierAssignedID, ?array $SummaryDescription, ?TotalInvoiceAmount $TotalInvoiceAmount, ?DeclaredCustomsValueAmount $DeclaredCustomsValueAmount, ?array $TariffDescription, ?TariffCode $TariffCode, ?InsurancePremiumAmount $InsurancePremiumAmount, ?GrossWeightMeasure $GrossWeightMeasure, ?NetWeightMeasure $NetWeightMeasure, ?NetNetWeightMeasure $NetNetWeightMeasure, ?ChargeableWeightMeasure $ChargeableWeightMeasure, ?GrossVolumeMeasure $GrossVolumeMeasure, ?NetVolumeMeasure $NetVolumeMeasure, ?LoadingLengthMeasure $LoadingLengthMeasure, ?array $Remarks, ?HazardousRiskIndicator $HazardousRiskIndicator, ?AnimalFoodIndicator $AnimalFoodIndicator, ?HumanFoodIndicator $HumanFoodIndicator, ?LivestockIndicator $LivestockIndicator, ?BulkCargoIndicator $BulkCargoIndicator, ?ContainerizedIndicator $ContainerizedIndicator, ?GeneralCargoIndicator $GeneralCargoIndicator, ?SpecialSecurityIndicator $SpecialSecurityIndicator, ?ThirdPartyPayerIndicator $ThirdPartyPayerIndicator, ?array $CarrierServiceInstructions, ?array $CustomsClearanceServiceInstructions, ?array $ForwarderServiceInstructions, ?array $SpecialServiceInstructions, ?SequenceID $SequenceID, ?ShippingPriorityLevelCode $ShippingPriorityLevelCode, ?HandlingCode $HandlingCode, ?array $HandlingInstructions, ?array $Information, ?TotalGoodsItemQuantity $TotalGoodsItemQuantity, ?TotalTransportHandlingUnitQuantity $TotalTransportHandlingUnitQuantity, ?InsuranceValueAmount $InsuranceValueAmount, ?DeclaredForCarriageValueAmount $DeclaredForCarriageValueAmount, ?DeclaredStatisticsValueAmount $DeclaredStatisticsValueAmount, ?FreeOnBoardValueAmount $FreeOnBoardValueAmount, ?array $SpecialInstructions, ?SplitConsignmentIndicator $SplitConsignmentIndicator, ?array $DeliveryInstructions, ?ConsignmentQuantity $ConsignmentQuantity, ?ConsolidatableIndicator $ConsolidatableIndicator, ?array $HaulageInstructions, ?LoadingSequenceID $LoadingSequenceID, ?ChildConsignmentQuantity $ChildConsignmentQuantity, ?TotalPackagesQuantity $TotalPackagesQuantity, ?array $ConsolidatedShipment, ?array $CustomsDeclaration, ?RequestedPickupTransportEvent $RequestedPickupTransportEvent, ?RequestedDeliveryTransportEvent $RequestedDeliveryTransportEvent, ?PlannedPickupTransportEvent $PlannedPickupTransportEvent, ?PlannedDeliveryTransportEvent $PlannedDeliveryTransportEvent, ?array $Status, ?array $ChildConsignment, ?ConsigneeParty $ConsigneeParty, ?ExporterParty $ExporterParty, ?ConsignorParty $ConsignorParty, ?ImporterParty $ImporterParty, ?CarrierParty $CarrierParty, ?FreightForwarderParty $FreightForwarderParty, ?NotifyParty $NotifyParty, ?OriginalDespatchParty $OriginalDespatchParty, ?FinalDeliveryParty $FinalDeliveryParty, ?PerformingCarrierParty $PerformingCarrierParty, ?SubstituteCarrierParty $SubstituteCarrierParty, ?LogisticsOperatorParty $LogisticsOperatorParty, ?TransportAdvisorParty $TransportAdvisorParty, ?HazardousItemNotificationParty $HazardousItemNotificationParty, ?InsuranceParty $InsuranceParty, ?MortgageHolderParty $MortgageHolderParty, ?BillOfLadingHolderParty $BillOfLadingHolderParty, ?OriginalDepartureCountry $OriginalDepartureCountry, ?FinalDestinationCountry $FinalDestinationCountry, ?array $TransitCountry, ?TransportContract $TransportContract, ?array $TransportEvent, ?OriginalDespatchTransportationService $OriginalDespatchTransportationService, ?FinalDeliveryTransportationService $FinalDeliveryTransportationService, ?DeliveryTerms $DeliveryTerms, ?PaymentTerms $PaymentTerms, ?CollectPaymentTerms $CollectPaymentTerms, ?DisbursementPaymentTerms $DisbursementPaymentTerms, ?PrepaidPaymentTerms $PrepaidPaymentTerms, ?array $FreightAllowanceCharge, ?array $ExtraAllowanceCharge, ?array $MainCarriageShipmentStage, ?array $PreCarriageShipmentStage, ?array $OnCarriageShipmentStage, ?array $TransportHandlingUnit, ?FirstArrivalPortLocation $FirstArrivalPortLocation, ?LastExitPortLocation $LastExitPortLocation)
    {
        $this->ID = $ID;
        $this->CarrierAssignedID = $CarrierAssignedID;
        $this->ConsigneeAssignedID = $ConsigneeAssignedID;
        $this->ConsignorAssignedID = $ConsignorAssignedID;
        $this->FreightForwarderAssignedID = $FreightForwarderAssignedID;
        $this->BrokerAssignedID = $BrokerAssignedID;
        $this->ContractedCarrierAssignedID = $ContractedCarrierAssignedID;
        $this->PerformingCarrierAssignedID = $PerformingCarrierAssignedID;
        $this->SummaryDescription = $SummaryDescription;
        $this->TotalInvoiceAmount = $TotalInvoiceAmount;
        $this->DeclaredCustomsValueAmount = $DeclaredCustomsValueAmount;
        $this->TariffDescription = $TariffDescription;
        $this->TariffCode = $TariffCode;
        $this->InsurancePremiumAmount = $InsurancePremiumAmount;
        $this->GrossWeightMeasure = $GrossWeightMeasure;
        $this->NetWeightMeasure = $NetWeightMeasure;
        $this->NetNetWeightMeasure = $NetNetWeightMeasure;
        $this->ChargeableWeightMeasure = $ChargeableWeightMeasure;
        $this->GrossVolumeMeasure = $GrossVolumeMeasure;
        $this->NetVolumeMeasure = $NetVolumeMeasure;
        $this->LoadingLengthMeasure = $LoadingLengthMeasure;
        $this->Remarks = $Remarks;
        $this->HazardousRiskIndicator = $HazardousRiskIndicator;
        $this->AnimalFoodIndicator = $AnimalFoodIndicator;
        $this->HumanFoodIndicator = $HumanFoodIndicator;
        $this->LivestockIndicator = $LivestockIndicator;
        $this->BulkCargoIndicator = $BulkCargoIndicator;
        $this->ContainerizedIndicator = $ContainerizedIndicator;
        $this->GeneralCargoIndicator = $GeneralCargoIndicator;
        $this->SpecialSecurityIndicator = $SpecialSecurityIndicator;
        $this->ThirdPartyPayerIndicator = $ThirdPartyPayerIndicator;
        $this->CarrierServiceInstructions = $CarrierServiceInstructions;
        $this->CustomsClearanceServiceInstructions = $CustomsClearanceServiceInstructions;
        $this->ForwarderServiceInstructions = $ForwarderServiceInstructions;
        $this->SpecialServiceInstructions = $SpecialServiceInstructions;
        $this->SequenceID = $SequenceID;
        $this->ShippingPriorityLevelCode = $ShippingPriorityLevelCode;
        $this->HandlingCode = $HandlingCode;
        $this->HandlingInstructions = $HandlingInstructions;
        $this->Information = $Information;
        $this->TotalGoodsItemQuantity = $TotalGoodsItemQuantity;
        $this->TotalTransportHandlingUnitQuantity = $TotalTransportHandlingUnitQuantity;
        $this->InsuranceValueAmount = $InsuranceValueAmount;
        $this->DeclaredForCarriageValueAmount = $DeclaredForCarriageValueAmount;
        $this->DeclaredStatisticsValueAmount = $DeclaredStatisticsValueAmount;
        $this->FreeOnBoardValueAmount = $FreeOnBoardValueAmount;
        $this->SpecialInstructions = $SpecialInstructions;
        $this->SplitConsignmentIndicator = $SplitConsignmentIndicator;
        $this->DeliveryInstructions = $DeliveryInstructions;
        $this->ConsignmentQuantity = $ConsignmentQuantity;
        $this->ConsolidatableIndicator = $ConsolidatableIndicator;
        $this->HaulageInstructions = $HaulageInstructions;
        $this->LoadingSequenceID = $LoadingSequenceID;
        $this->ChildConsignmentQuantity = $ChildConsignmentQuantity;
        $this->TotalPackagesQuantity = $TotalPackagesQuantity;
        $this->ConsolidatedShipment = $ConsolidatedShipment;
        $this->CustomsDeclaration = $CustomsDeclaration;
        $this->RequestedPickupTransportEvent = $RequestedPickupTransportEvent;
        $this->RequestedDeliveryTransportEvent = $RequestedDeliveryTransportEvent;
        $this->PlannedPickupTransportEvent = $PlannedPickupTransportEvent;
        $this->PlannedDeliveryTransportEvent = $PlannedDeliveryTransportEvent;
        $this->Status = $Status;
        $this->ChildConsignment = $ChildConsignment;
        $this->ConsigneeParty = $ConsigneeParty;
        $this->ExporterParty = $ExporterParty;
        $this->ConsignorParty = $ConsignorParty;
        $this->ImporterParty = $ImporterParty;
        $this->CarrierParty = $CarrierParty;
        $this->FreightForwarderParty = $FreightForwarderParty;
        $this->NotifyParty = $NotifyParty;
        $this->OriginalDespatchParty = $OriginalDespatchParty;
        $this->FinalDeliveryParty = $FinalDeliveryParty;
        $this->PerformingCarrierParty = $PerformingCarrierParty;
        $this->SubstituteCarrierParty = $SubstituteCarrierParty;
        $this->LogisticsOperatorParty = $LogisticsOperatorParty;
        $this->TransportAdvisorParty = $TransportAdvisorParty;
        $this->HazardousItemNotificationParty = $HazardousItemNotificationParty;
        $this->InsuranceParty = $InsuranceParty;
        $this->MortgageHolderParty = $MortgageHolderParty;
        $this->BillOfLadingHolderParty = $BillOfLadingHolderParty;
        $this->OriginalDepartureCountry = $OriginalDepartureCountry;
        $this->FinalDestinationCountry = $FinalDestinationCountry;
        $this->TransitCountry = $TransitCountry;
        $this->TransportContract = $TransportContract;
        $this->TransportEvent = $TransportEvent;
        $this->OriginalDespatchTransportationService = $OriginalDespatchTransportationService;
        $this->FinalDeliveryTransportationService = $FinalDeliveryTransportationService;
        $this->DeliveryTerms = $DeliveryTerms;
        $this->PaymentTerms = $PaymentTerms;
        $this->CollectPaymentTerms = $CollectPaymentTerms;
        $this->DisbursementPaymentTerms = $DisbursementPaymentTerms;
        $this->PrepaidPaymentTerms = $PrepaidPaymentTerms;
        $this->FreightAllowanceCharge = $FreightAllowanceCharge;
        $this->ExtraAllowanceCharge = $ExtraAllowanceCharge;
        $this->MainCarriageShipmentStage = $MainCarriageShipmentStage;
        $this->PreCarriageShipmentStage = $PreCarriageShipmentStage;
        $this->OnCarriageShipmentStage = $OnCarriageShipmentStage;
        $this->TransportHandlingUnit = $TransportHandlingUnit;
        $this->FirstArrivalPortLocation = $FirstArrivalPortLocation;
        $this->LastExitPortLocation = $LastExitPortLocation;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->CarrierAssignedID) {
            $response[] = (string) $this->CarrierAssignedID;
        }
        if ($this->ConsigneeAssignedID) {
            $response[] = (string) $this->ConsigneeAssignedID;
        }
        if ($this->ConsignorAssignedID) {
            $response[] = (string) $this->ConsignorAssignedID;
        }
        if ($this->FreightForwarderAssignedID) {
            $response[] = (string) $this->FreightForwarderAssignedID;
        }
        if ($this->BrokerAssignedID) {
            $response[] = (string) $this->BrokerAssignedID;
        }
        if ($this->ContractedCarrierAssignedID) {
            $response[] = (string) $this->ContractedCarrierAssignedID;
        }
        if ($this->PerformingCarrierAssignedID) {
            $response[] = (string) $this->PerformingCarrierAssignedID;
        }
        if ($this->SummaryDescription) {
            foreach ($this->SummaryDescription as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TotalInvoiceAmount) {
            $response[] = (string) $this->TotalInvoiceAmount;
        }
        if ($this->DeclaredCustomsValueAmount) {
            $response[] = (string) $this->DeclaredCustomsValueAmount;
        }
        if ($this->TariffDescription) {
            foreach ($this->TariffDescription as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TariffCode) {
            $response[] = (string) $this->TariffCode;
        }
        if ($this->InsurancePremiumAmount) {
            $response[] = (string) $this->InsurancePremiumAmount;
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
        if ($this->LoadingLengthMeasure) {
            $response[] = (string) $this->LoadingLengthMeasure;
        }
        if ($this->Remarks) {
            foreach ($this->Remarks as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousRiskIndicator) {
            $response[] = (string) $this->HazardousRiskIndicator;
        }
        if ($this->AnimalFoodIndicator) {
            $response[] = (string) $this->AnimalFoodIndicator;
        }
        if ($this->HumanFoodIndicator) {
            $response[] = (string) $this->HumanFoodIndicator;
        }
        if ($this->LivestockIndicator) {
            $response[] = (string) $this->LivestockIndicator;
        }
        if ($this->BulkCargoIndicator) {
            $response[] = (string) $this->BulkCargoIndicator;
        }
        if ($this->ContainerizedIndicator) {
            $response[] = (string) $this->ContainerizedIndicator;
        }
        if ($this->GeneralCargoIndicator) {
            $response[] = (string) $this->GeneralCargoIndicator;
        }
        if ($this->SpecialSecurityIndicator) {
            $response[] = (string) $this->SpecialSecurityIndicator;
        }
        if ($this->ThirdPartyPayerIndicator) {
            $response[] = (string) $this->ThirdPartyPayerIndicator;
        }
        if ($this->CarrierServiceInstructions) {
            foreach ($this->CarrierServiceInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CustomsClearanceServiceInstructions) {
            foreach ($this->CustomsClearanceServiceInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ForwarderServiceInstructions) {
            foreach ($this->ForwarderServiceInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SpecialServiceInstructions) {
            foreach ($this->SpecialServiceInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SequenceID) {
            $response[] = (string) $this->SequenceID;
        }
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
        if ($this->TotalGoodsItemQuantity) {
            $response[] = (string) $this->TotalGoodsItemQuantity;
        }
        if ($this->TotalTransportHandlingUnitQuantity) {
            $response[] = (string) $this->TotalTransportHandlingUnitQuantity;
        }
        if ($this->InsuranceValueAmount) {
            $response[] = (string) $this->InsuranceValueAmount;
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
        if ($this->SplitConsignmentIndicator) {
            $response[] = (string) $this->SplitConsignmentIndicator;
        }
        if ($this->DeliveryInstructions) {
            foreach ($this->DeliveryInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ConsignmentQuantity) {
            $response[] = (string) $this->ConsignmentQuantity;
        }
        if ($this->ConsolidatableIndicator) {
            $response[] = (string) $this->ConsolidatableIndicator;
        }
        if ($this->HaulageInstructions) {
            foreach ($this->HaulageInstructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->LoadingSequenceID) {
            $response[] = (string) $this->LoadingSequenceID;
        }
        if ($this->ChildConsignmentQuantity) {
            $response[] = (string) $this->ChildConsignmentQuantity;
        }
        if ($this->TotalPackagesQuantity) {
            $response[] = (string) $this->TotalPackagesQuantity;
        }
        if ($this->ConsolidatedShipment) {
            foreach ($this->ConsolidatedShipment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CustomsDeclaration) {
            foreach ($this->CustomsDeclaration as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->RequestedPickupTransportEvent) {
            $response[] = (string) $this->RequestedPickupTransportEvent;
        }
        if ($this->RequestedDeliveryTransportEvent) {
            $response[] = (string) $this->RequestedDeliveryTransportEvent;
        }
        if ($this->PlannedPickupTransportEvent) {
            $response[] = (string) $this->PlannedPickupTransportEvent;
        }
        if ($this->PlannedDeliveryTransportEvent) {
            $response[] = (string) $this->PlannedDeliveryTransportEvent;
        }
        if ($this->Status) {
            foreach ($this->Status as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ChildConsignment) {
            foreach ($this->ChildConsignment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ConsigneeParty) {
            $response[] = (string) $this->ConsigneeParty;
        }
        if ($this->ExporterParty) {
            $response[] = (string) $this->ExporterParty;
        }
        if ($this->ConsignorParty) {
            $response[] = (string) $this->ConsignorParty;
        }
        if ($this->ImporterParty) {
            $response[] = (string) $this->ImporterParty;
        }
        if ($this->CarrierParty) {
            $response[] = (string) $this->CarrierParty;
        }
        if ($this->FreightForwarderParty) {
            $response[] = (string) $this->FreightForwarderParty;
        }
        if ($this->NotifyParty) {
            $response[] = (string) $this->NotifyParty;
        }
        if ($this->OriginalDespatchParty) {
            $response[] = (string) $this->OriginalDespatchParty;
        }
        if ($this->FinalDeliveryParty) {
            $response[] = (string) $this->FinalDeliveryParty;
        }
        if ($this->PerformingCarrierParty) {
            $response[] = (string) $this->PerformingCarrierParty;
        }
        if ($this->SubstituteCarrierParty) {
            $response[] = (string) $this->SubstituteCarrierParty;
        }
        if ($this->LogisticsOperatorParty) {
            $response[] = (string) $this->LogisticsOperatorParty;
        }
        if ($this->TransportAdvisorParty) {
            $response[] = (string) $this->TransportAdvisorParty;
        }
        if ($this->HazardousItemNotificationParty) {
            $response[] = (string) $this->HazardousItemNotificationParty;
        }
        if ($this->InsuranceParty) {
            $response[] = (string) $this->InsuranceParty;
        }
        if ($this->MortgageHolderParty) {
            $response[] = (string) $this->MortgageHolderParty;
        }
        if ($this->BillOfLadingHolderParty) {
            $response[] = (string) $this->BillOfLadingHolderParty;
        }
        if ($this->OriginalDepartureCountry) {
            $response[] = (string) $this->OriginalDepartureCountry;
        }
        if ($this->FinalDestinationCountry) {
            $response[] = (string) $this->FinalDestinationCountry;
        }
        if ($this->TransitCountry) {
            foreach ($this->TransitCountry as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportContract) {
            $response[] = (string) $this->TransportContract;
        }
        if ($this->TransportEvent) {
            foreach ($this->TransportEvent as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OriginalDespatchTransportationService) {
            $response[] = (string) $this->OriginalDespatchTransportationService;
        }
        if ($this->FinalDeliveryTransportationService) {
            $response[] = (string) $this->FinalDeliveryTransportationService;
        }
        if ($this->DeliveryTerms) {
            $response[] = (string) $this->DeliveryTerms;
        }
        if ($this->PaymentTerms) {
            $response[] = (string) $this->PaymentTerms;
        }
        if ($this->CollectPaymentTerms) {
            $response[] = (string) $this->CollectPaymentTerms;
        }
        if ($this->DisbursementPaymentTerms) {
            $response[] = (string) $this->DisbursementPaymentTerms;
        }
        if ($this->PrepaidPaymentTerms) {
            $response[] = (string) $this->PrepaidPaymentTerms;
        }
        if ($this->FreightAllowanceCharge) {
            foreach ($this->FreightAllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ExtraAllowanceCharge) {
            foreach ($this->ExtraAllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MainCarriageShipmentStage) {
            foreach ($this->MainCarriageShipmentStage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PreCarriageShipmentStage) {
            foreach ($this->PreCarriageShipmentStage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OnCarriageShipmentStage) {
            foreach ($this->OnCarriageShipmentStage as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransportHandlingUnit) {
            foreach ($this->TransportHandlingUnit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FirstArrivalPortLocation) {
            $response[] = (string) $this->FirstArrivalPortLocation;
        }
        if ($this->LastExitPortLocation) {
            $response[] = (string) $this->LastExitPortLocation;
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
