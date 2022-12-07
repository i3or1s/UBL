<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ActualDespatchDate;
use i3or1s\UBL\CBC\ActualDespatchTime;
use i3or1s\UBL\CBC\EstimatedDespatchDate;
use i3or1s\UBL\CBC\EstimatedDespatchTime;
use i3or1s\UBL\CBC\GuaranteedDespatchDate;
use i3or1s\UBL\CBC\GuaranteedDespatchTime;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Instructions;
use i3or1s\UBL\CBC\ReleaseID;
use i3or1s\UBL\CBC\RequestedDespatchDate;
use i3or1s\UBL\CBC\RequestedDespatchTime;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Despatch.html.
 */
final class Despatch implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:Despatch';

    public readonly ?ID $ID; // [0..1]    An identifier for this despatch event.
    public readonly ?RequestedDespatchDate $RequestedDespatchDate; // [0..1]    The despatch (pickup) date requested, normally by the buyer.
    public readonly ?RequestedDespatchTime $RequestedDespatchTime; // [0..1]    The despatch (pickup) time requested, normally by the buyer.
    public readonly ?EstimatedDespatchDate $EstimatedDespatchDate; // [0..1]    The estimated despatch (pickup) date.
    public readonly ?EstimatedDespatchTime $EstimatedDespatchTime; // [0..1]    The estimated despatch (pickup) time.
    public readonly ?ActualDespatchDate $ActualDespatchDate; // [0..1]    The actual despatch (pickup) date.
    public readonly ?ActualDespatchTime $ActualDespatchTime; // [0..1]    The actual despatch (pickup) time.
    public readonly ?GuaranteedDespatchDate $GuaranteedDespatchDate; // [0..1]    The date guaranteed for the despatch (pickup).
    public readonly ?GuaranteedDespatchTime $GuaranteedDespatchTime; // [0..1]    The time guaranteed for the despatch (pickup).
    public readonly ?ReleaseID $ReleaseID; // [0..1]    An identifier for the release of the despatch used as security control or cargo control (pick-up).
    /** @var Instructions[]|null */
    public readonly ?array $Instructions; // [0..*]    Text describing any special instructions applying to the despatch (pickup).
    public readonly ?DespatchAddress $DespatchAddress; // [0..1]    The address of the despatch (pickup).
    public readonly ?DespatchLocation $DespatchLocation; // [0..1]    The location of the despatch (pickup).
    public readonly ?DespatchParty $DespatchParty; // [0..1]    The party despatching the goods.
    public readonly ?CarrierParty $CarrierParty; // [0..1]    The party carrying the goods.
    /** @var NotifyParty[]|null */
    public readonly ?array $NotifyParty; // [0..*]    A party to be notified of this despatch (pickup).
    public readonly ?Contact $Contact; // [0..1]    The primary contact for this despatch (pickup).
    public readonly ?EstimatedDespatchPeriod $EstimatedDespatchPeriod; // [0..1]    The period estimated for the despatch (pickup) of goods.
    public readonly ?RequestedDespatchPeriod $RequestedDespatchPeriod; // [0..1]    The period requested for the despatch (pickup) of goods.

    /**
     * @param Instructions[]|null $Instructions
     * @param NotifyParty[]|null  $NotifyParty
     */
    public function __construct(?ID $ID, ?RequestedDespatchDate $RequestedDespatchDate, ?RequestedDespatchTime $RequestedDespatchTime, ?EstimatedDespatchDate $EstimatedDespatchDate, ?EstimatedDespatchTime $EstimatedDespatchTime, ?ActualDespatchDate $ActualDespatchDate, ?ActualDespatchTime $ActualDespatchTime, ?GuaranteedDespatchDate $GuaranteedDespatchDate, ?GuaranteedDespatchTime $GuaranteedDespatchTime, ?ReleaseID $ReleaseID, ?array $Instructions, ?DespatchAddress $DespatchAddress, ?DespatchLocation $DespatchLocation, ?DespatchParty $DespatchParty, ?CarrierParty $CarrierParty, ?array $NotifyParty, ?Contact $Contact, ?EstimatedDespatchPeriod $EstimatedDespatchPeriod, ?RequestedDespatchPeriod $RequestedDespatchPeriod)
    {
        $this->ID = $ID;
        $this->RequestedDespatchDate = $RequestedDespatchDate;
        $this->RequestedDespatchTime = $RequestedDespatchTime;
        $this->EstimatedDespatchDate = $EstimatedDespatchDate;
        $this->EstimatedDespatchTime = $EstimatedDespatchTime;
        $this->ActualDespatchDate = $ActualDespatchDate;
        $this->ActualDespatchTime = $ActualDespatchTime;
        $this->GuaranteedDespatchDate = $GuaranteedDespatchDate;
        $this->GuaranteedDespatchTime = $GuaranteedDespatchTime;
        $this->ReleaseID = $ReleaseID;
        $this->Instructions = $Instructions;
        $this->DespatchAddress = $DespatchAddress;
        $this->DespatchLocation = $DespatchLocation;
        $this->DespatchParty = $DespatchParty;
        $this->CarrierParty = $CarrierParty;
        $this->NotifyParty = $NotifyParty;
        $this->Contact = $Contact;
        $this->EstimatedDespatchPeriod = $EstimatedDespatchPeriod;
        $this->RequestedDespatchPeriod = $RequestedDespatchPeriod;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->RequestedDespatchDate) {
            $response[] = (string) $this->RequestedDespatchDate;
        }
        if ($this->RequestedDespatchTime) {
            $response[] = (string) $this->RequestedDespatchTime;
        }
        if ($this->EstimatedDespatchDate) {
            $response[] = (string) $this->EstimatedDespatchDate;
        }
        if ($this->EstimatedDespatchTime) {
            $response[] = (string) $this->EstimatedDespatchTime;
        }
        if ($this->ActualDespatchDate) {
            $response[] = (string) $this->ActualDespatchDate;
        }
        if ($this->ActualDespatchTime) {
            $response[] = (string) $this->ActualDespatchTime;
        }
        if ($this->GuaranteedDespatchDate) {
            $response[] = (string) $this->GuaranteedDespatchDate;
        }
        if ($this->GuaranteedDespatchTime) {
            $response[] = (string) $this->GuaranteedDespatchTime;
        }
        if ($this->ReleaseID) {
            $response[] = (string) $this->ReleaseID;
        }
        if ($this->Instructions) {
            foreach ($this->Instructions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DespatchAddress) {
            $response[] = (string) $this->DespatchAddress;
        }
        if ($this->DespatchLocation) {
            $response[] = (string) $this->DespatchLocation;
        }
        if ($this->DespatchParty) {
            $response[] = (string) $this->DespatchParty;
        }
        if ($this->CarrierParty) {
            $response[] = (string) $this->CarrierParty;
        }
        if ($this->NotifyParty) {
            foreach ($this->NotifyParty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Contact) {
            $response[] = (string) $this->Contact;
        }
        if ($this->EstimatedDespatchPeriod) {
            $response[] = (string) $this->EstimatedDespatchPeriod;
        }
        if ($this->RequestedDespatchPeriod) {
            $response[] = (string) $this->RequestedDespatchPeriod;
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
