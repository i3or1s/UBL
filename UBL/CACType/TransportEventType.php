<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Contact;
use i3or1s\UBL\CAC\CurrentStatus;
use i3or1s\UBL\CAC\Location;
use i3or1s\UBL\CAC\Period;
use i3or1s\UBL\CAC\ReportedShipment;
use i3or1s\UBL\CAC\Signature;
use i3or1s\UBL\CBC\CompletionIndicator;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\IdentificationID;
use i3or1s\UBL\CBC\OccurrenceDate;
use i3or1s\UBL\CBC\OccurrenceTime;
use i3or1s\UBL\CBC\TransportEventTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TransportEventType.html.
 */
abstract class TransportEventType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportEventType';

    public readonly ?IdentificationID $IdentificationID; // [0..1]    An identifier for this transport event within an agreed event identification scheme.
    public readonly ?OccurrenceDate $OccurrenceDate; // [0..1]    The date of this transport event.
    public readonly ?OccurrenceTime $OccurrenceTime; // [0..1]    The time of this transport event.
    public readonly ?TransportEventTypeCode $TransportEventTypeCode; // [0..1]    A code signifying the type of this transport event.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this transport event.
    public readonly ?CompletionIndicator $CompletionIndicator; // [0..1]    An indicator that this transport event has been completed (true) or not (false).
    public readonly ?ReportedShipment $ReportedShipment; // [0..1]    The shipment involved in this transport event.
    /** @var CurrentStatus[]|null */
    public readonly ?array $CurrentStatus; // [0..*]    The current status of this transport event.
    /** @var Contact[]|null */
    public readonly ?array $Contact; // [0..*]    A contact associated with this transport event.
    public readonly ?Location $Location; // [0..1]    The location associated with this transport event.
    public readonly ?Signature $Signature; // [0..1]    A signature that can be used to sign for an entry or an exit at a transport location (e.g., port terminal).
    /** @var Period[]|null */
    public readonly ?array $Period; // [0..*]    A period of time associated with this transport event.

    /**
     * @param Description[]|null   $Description
     * @param CurrentStatus[]|null $CurrentStatus
     * @param Contact[]|null       $Contact
     * @param Period[]|null        $Period
     */
    public function __construct(?IdentificationID $IdentificationID, ?OccurrenceDate $OccurrenceDate, ?OccurrenceTime $OccurrenceTime, ?TransportEventTypeCode $TransportEventTypeCode, ?array $Description, ?CompletionIndicator $CompletionIndicator, ?ReportedShipment $ReportedShipment, ?array $CurrentStatus, ?array $Contact, ?Location $Location, ?Signature $Signature, ?array $Period)
    {
        $this->IdentificationID = $IdentificationID;
        $this->OccurrenceDate = $OccurrenceDate;
        $this->OccurrenceTime = $OccurrenceTime;
        $this->TransportEventTypeCode = $TransportEventTypeCode;
        $this->Description = $Description;
        $this->CompletionIndicator = $CompletionIndicator;
        $this->ReportedShipment = $ReportedShipment;
        $this->CurrentStatus = $CurrentStatus;
        $this->Contact = $Contact;
        $this->Location = $Location;
        $this->Signature = $Signature;
        $this->Period = $Period;
    }

    public function __toString()
    {
        $response = [];
        if ($this->IdentificationID) {
            $response[] = (string) $this->IdentificationID;
        }
        if ($this->OccurrenceDate) {
            $response[] = (string) $this->OccurrenceDate;
        }
        if ($this->OccurrenceTime) {
            $response[] = (string) $this->OccurrenceTime;
        }
        if ($this->TransportEventTypeCode) {
            $response[] = (string) $this->TransportEventTypeCode;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CompletionIndicator) {
            $response[] = (string) $this->CompletionIndicator;
        }
        if ($this->ReportedShipment) {
            $response[] = (string) $this->ReportedShipment;
        }
        if ($this->CurrentStatus) {
            foreach ($this->CurrentStatus as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Contact) {
            foreach ($this->Contact as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Location) {
            $response[] = (string) $this->Location;
        }
        if ($this->Signature) {
            $response[] = (string) $this->Signature;
        }
        if ($this->Period) {
            foreach ($this->Period as $elem) {
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
