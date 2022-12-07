<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AlternativeDeliveryLocation;
use i3or1s\UBL\CAC\CarrierParty;
use i3or1s\UBL\CAC\DeliveryAddress;
use i3or1s\UBL\CAC\DeliveryLocation;
use i3or1s\UBL\CAC\DeliveryParty;
use i3or1s\UBL\CAC\DeliveryTerms;
use i3or1s\UBL\CAC\Despatch;
use i3or1s\UBL\CAC\EstimatedDeliveryPeriod;
use i3or1s\UBL\CAC\MaximumDeliveryUnit;
use i3or1s\UBL\CAC\MinimumDeliveryUnit;
use i3or1s\UBL\CAC\NotifyParty;
use i3or1s\UBL\CAC\PromisedDeliveryPeriod;
use i3or1s\UBL\CAC\RequestedDeliveryPeriod;
use i3or1s\UBL\CAC\Shipment;
use i3or1s\UBL\CBC\ActualDeliveryDate;
use i3or1s\UBL\CBC\ActualDeliveryTime;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\LatestDeliveryDate;
use i3or1s\UBL\CBC\LatestDeliveryTime;
use i3or1s\UBL\CBC\MaximumQuantity;
use i3or1s\UBL\CBC\MinimumQuantity;
use i3or1s\UBL\CBC\Quantity;
use i3or1s\UBL\CBC\ReleaseID;
use i3or1s\UBL\CBC\TrackingID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_DeliveryType.html.
 */
abstract class DeliveryType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:DeliveryType';

    public readonly ?ID $ID; // [0..1]    An identifier for this delivery.
    public readonly ?Quantity $Quantity; // [0..1]    The quantity of items, child consignments, shipments in this delivery.
    public readonly ?MinimumQuantity $MinimumQuantity; // [0..1]    The minimum quantity of items, child consignments, shipments in this delivery.
    public readonly ?MaximumQuantity $MaximumQuantity; // [0..1]    The maximum quantity of items, child consignments, shipments in this delivery.
    public readonly ?ActualDeliveryDate $ActualDeliveryDate; // [0..1]    The actual date of delivery.
    public readonly ?ActualDeliveryTime $ActualDeliveryTime; // [0..1]    The actual time of delivery.
    public readonly ?LatestDeliveryDate $LatestDeliveryDate; // [0..1]    The latest date of delivery allowed by the buyer.
    public readonly ?LatestDeliveryTime $LatestDeliveryTime; // [0..1]    The latest time of delivery allowed by the buyer.
    public readonly ?ReleaseID $ReleaseID; // [0..1]    An identifier used for approval of access to delivery locations (e.g., port terminals).
    public readonly ?TrackingID $TrackingID; // [0..1]    The delivery Tracking ID (for transport tracking).
    public readonly ?DeliveryAddress $DeliveryAddress; // [0..1]    The delivery address.
    public readonly ?DeliveryLocation $DeliveryLocation; // [0..1]    The delivery location.
    public readonly ?AlternativeDeliveryLocation $AlternativeDeliveryLocation; // [0..1]    An alternative delivery location.
    public readonly ?RequestedDeliveryPeriod $RequestedDeliveryPeriod; // [0..1]    The period requested for delivery.
    public readonly ?PromisedDeliveryPeriod $PromisedDeliveryPeriod; // [0..1]    The period promised for delivery.
    public readonly ?EstimatedDeliveryPeriod $EstimatedDeliveryPeriod; // [0..1]    The period estimated for delivery.
    public readonly ?CarrierParty $CarrierParty; // [0..1]    The party responsible for delivering the goods.
    public readonly ?DeliveryParty $DeliveryParty; // [0..1]    The party to whom the goods are delivered.
    /** @var NotifyParty[]|null */
    public readonly ?array $NotifyParty; // [0..*]    A party to be notified of this delivery.
    public readonly ?Despatch $Despatch; // [0..1]    The despatch (pickup) associated with this delivery.
    /** @var DeliveryTerms[]|null */
    public readonly ?array $DeliveryTerms; // [0..*]    Terms and conditions relating to the delivery.
    public readonly ?MinimumDeliveryUnit $MinimumDeliveryUnit; // [0..1]    The minimum delivery unit for this delivery.
    public readonly ?MaximumDeliveryUnit $MaximumDeliveryUnit; // [0..1]    The maximum delivery unit for this delivery.
    public readonly ?Shipment $Shipment; // [0..1]    The shipment being delivered.

    /**
     * @param NotifyParty[]|null   $NotifyParty
     * @param DeliveryTerms[]|null $DeliveryTerms
     */
    public function __construct(?ID $ID, ?Quantity $Quantity, ?MinimumQuantity $MinimumQuantity, ?MaximumQuantity $MaximumQuantity, ?ActualDeliveryDate $ActualDeliveryDate, ?ActualDeliveryTime $ActualDeliveryTime, ?LatestDeliveryDate $LatestDeliveryDate, ?LatestDeliveryTime $LatestDeliveryTime, ?ReleaseID $ReleaseID, ?TrackingID $TrackingID, ?DeliveryAddress $DeliveryAddress, ?DeliveryLocation $DeliveryLocation, ?AlternativeDeliveryLocation $AlternativeDeliveryLocation, ?RequestedDeliveryPeriod $RequestedDeliveryPeriod, ?PromisedDeliveryPeriod $PromisedDeliveryPeriod, ?EstimatedDeliveryPeriod $EstimatedDeliveryPeriod, ?CarrierParty $CarrierParty, ?DeliveryParty $DeliveryParty, ?array $NotifyParty, ?Despatch $Despatch, ?array $DeliveryTerms, ?MinimumDeliveryUnit $MinimumDeliveryUnit, ?MaximumDeliveryUnit $MaximumDeliveryUnit, ?Shipment $Shipment)
    {
        $this->ID = $ID;
        $this->Quantity = $Quantity;
        $this->MinimumQuantity = $MinimumQuantity;
        $this->MaximumQuantity = $MaximumQuantity;
        $this->ActualDeliveryDate = $ActualDeliveryDate;
        $this->ActualDeliveryTime = $ActualDeliveryTime;
        $this->LatestDeliveryDate = $LatestDeliveryDate;
        $this->LatestDeliveryTime = $LatestDeliveryTime;
        $this->ReleaseID = $ReleaseID;
        $this->TrackingID = $TrackingID;
        $this->DeliveryAddress = $DeliveryAddress;
        $this->DeliveryLocation = $DeliveryLocation;
        $this->AlternativeDeliveryLocation = $AlternativeDeliveryLocation;
        $this->RequestedDeliveryPeriod = $RequestedDeliveryPeriod;
        $this->PromisedDeliveryPeriod = $PromisedDeliveryPeriod;
        $this->EstimatedDeliveryPeriod = $EstimatedDeliveryPeriod;
        $this->CarrierParty = $CarrierParty;
        $this->DeliveryParty = $DeliveryParty;
        $this->NotifyParty = $NotifyParty;
        $this->Despatch = $Despatch;
        $this->DeliveryTerms = $DeliveryTerms;
        $this->MinimumDeliveryUnit = $MinimumDeliveryUnit;
        $this->MaximumDeliveryUnit = $MaximumDeliveryUnit;
        $this->Shipment = $Shipment;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Quantity) {
            $response[] = (string) $this->Quantity;
        }
        if ($this->MinimumQuantity) {
            $response[] = (string) $this->MinimumQuantity;
        }
        if ($this->MaximumQuantity) {
            $response[] = (string) $this->MaximumQuantity;
        }
        if ($this->ActualDeliveryDate) {
            $response[] = (string) $this->ActualDeliveryDate;
        }
        if ($this->ActualDeliveryTime) {
            $response[] = (string) $this->ActualDeliveryTime;
        }
        if ($this->LatestDeliveryDate) {
            $response[] = (string) $this->LatestDeliveryDate;
        }
        if ($this->LatestDeliveryTime) {
            $response[] = (string) $this->LatestDeliveryTime;
        }
        if ($this->ReleaseID) {
            $response[] = (string) $this->ReleaseID;
        }
        if ($this->TrackingID) {
            $response[] = (string) $this->TrackingID;
        }
        if ($this->DeliveryAddress) {
            $response[] = (string) $this->DeliveryAddress;
        }
        if ($this->DeliveryLocation) {
            $response[] = (string) $this->DeliveryLocation;
        }
        if ($this->AlternativeDeliveryLocation) {
            $response[] = (string) $this->AlternativeDeliveryLocation;
        }
        if ($this->RequestedDeliveryPeriod) {
            $response[] = (string) $this->RequestedDeliveryPeriod;
        }
        if ($this->PromisedDeliveryPeriod) {
            $response[] = (string) $this->PromisedDeliveryPeriod;
        }
        if ($this->EstimatedDeliveryPeriod) {
            $response[] = (string) $this->EstimatedDeliveryPeriod;
        }
        if ($this->CarrierParty) {
            $response[] = (string) $this->CarrierParty;
        }
        if ($this->DeliveryParty) {
            $response[] = (string) $this->DeliveryParty;
        }
        if ($this->NotifyParty) {
            foreach ($this->NotifyParty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Despatch) {
            $response[] = (string) $this->Despatch;
        }
        if ($this->DeliveryTerms) {
            foreach ($this->DeliveryTerms as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MinimumDeliveryUnit) {
            $response[] = (string) $this->MinimumDeliveryUnit;
        }
        if ($this->MaximumDeliveryUnit) {
            $response[] = (string) $this->MaximumDeliveryUnit;
        }
        if ($this->Shipment) {
            $response[] = (string) $this->Shipment;
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
