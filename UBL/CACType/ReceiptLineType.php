<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\DespatchLineReference;
use i3or1s\UBL\CAC\DocumentReference;
use i3or1s\UBL\CAC\Item;
use i3or1s\UBL\CAC\OrderLineReference;
use i3or1s\UBL\CAC\Shipment;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\OversupplyQuantity;
use i3or1s\UBL\CBC\QuantityDiscrepancyCode;
use i3or1s\UBL\CBC\ReceivedDate;
use i3or1s\UBL\CBC\ReceivedQuantity;
use i3or1s\UBL\CBC\RejectActionCode;
use i3or1s\UBL\CBC\RejectedQuantity;
use i3or1s\UBL\CBC\RejectReason;
use i3or1s\UBL\CBC\RejectReasonCode;
use i3or1s\UBL\CBC\ShortageActionCode;
use i3or1s\UBL\CBC\ShortQuantity;
use i3or1s\UBL\CBC\TimingComplaint;
use i3or1s\UBL\CBC\TimingComplaintCode;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ReceiptLineType.html.
 */
abstract class ReceiptLineType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ReceiptLineType';

    public readonly ID $ID; // [1..1]    An identifier for this receipt line.
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this receipt line.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures.
    public readonly ?ReceivedQuantity $ReceivedQuantity; // [0..1]    The quantity received.
    public readonly ?ShortQuantity $ShortQuantity; // [0..1]    The quantity received short; the difference between the quantity reported despatched and the quantity actually received.
    public readonly ?ShortageActionCode $ShortageActionCode; // [0..1]    A code signifying the action that the delivery party wishes the despatch party to take as the result of a shortage.
    public readonly ?RejectedQuantity $RejectedQuantity; // [0..1]    The quantity rejected.
    public readonly ?RejectReasonCode $RejectReasonCode; // [0..1]    The reason for a rejection, expressed as a code.
    /** @var RejectReason[]|null */
    public readonly ?array $RejectReason; // [0..*]    The reason for a rejection, expressed as text.
    public readonly ?RejectActionCode $RejectActionCode; // [0..1]    A code signifying the action that the delivery party wishes the despatch party to take as the result of a rejection.
    public readonly ?QuantityDiscrepancyCode $QuantityDiscrepancyCode; // [0..1]    A code signifying the type of a discrepancy in quantity.
    public readonly ?OversupplyQuantity $OversupplyQuantity; // [0..1]    The quantity over-supplied, i.e., the quantity over and above the quantity ordered.
    public readonly ?ReceivedDate $ReceivedDate; // [0..1]    The date on which the goods or services were received.
    public readonly ?TimingComplaintCode $TimingComplaintCode; // [0..1]    A complaint about the timing of delivery, expressed as a code.
    public readonly ?TimingComplaint $TimingComplaint; // [0..1]    A complaint about the timing of delivery, expressed as text.
    public readonly ?OrderLineReference $OrderLineReference; // [0..1]    A reference to the order line associated with this receipt line.
    /** @var DespatchLineReference[]|null */
    public readonly ?array $DespatchLineReference; // [0..*]    A reference to a despatch line associated with this receipt line.
    /** @var DocumentReference[]|null */
    public readonly ?array $DocumentReference; // [0..*]    A reference to a document associated with this receipt line.
    /** @var Item[]|null */
    public readonly ?array $Item; // [0..*]    An item associated with this receipt line.
    /** @var Shipment[]|null */
    public readonly ?array $Shipment; // [0..*]    A shipment associated with this receipt line.

    /**
     * @param Note[]|null                  $Note
     * @param RejectReason[]|null          $RejectReason
     * @param DespatchLineReference[]|null $DespatchLineReference
     * @param DocumentReference[]|null     $DocumentReference
     * @param Item[]|null                  $Item
     * @param Shipment[]|null              $Shipment
     */
    public function __construct(ID $ID, ?UUID $UUID, ?array $Note, ?ReceivedQuantity $ReceivedQuantity, ?ShortQuantity $ShortQuantity, ?ShortageActionCode $ShortageActionCode, ?RejectedQuantity $RejectedQuantity, ?RejectReasonCode $RejectReasonCode, ?array $RejectReason, ?RejectActionCode $RejectActionCode, ?QuantityDiscrepancyCode $QuantityDiscrepancyCode, ?OversupplyQuantity $OversupplyQuantity, ?ReceivedDate $ReceivedDate, ?TimingComplaintCode $TimingComplaintCode, ?TimingComplaint $TimingComplaint, ?OrderLineReference $OrderLineReference, ?array $DespatchLineReference, ?array $DocumentReference, ?array $Item, ?array $Shipment)
    {
        $this->ID = $ID;
        $this->UUID = $UUID;
        $this->Note = $Note;
        $this->ReceivedQuantity = $ReceivedQuantity;
        $this->ShortQuantity = $ShortQuantity;
        $this->ShortageActionCode = $ShortageActionCode;
        $this->RejectedQuantity = $RejectedQuantity;
        $this->RejectReasonCode = $RejectReasonCode;
        $this->RejectReason = $RejectReason;
        $this->RejectActionCode = $RejectActionCode;
        $this->QuantityDiscrepancyCode = $QuantityDiscrepancyCode;
        $this->OversupplyQuantity = $OversupplyQuantity;
        $this->ReceivedDate = $ReceivedDate;
        $this->TimingComplaintCode = $TimingComplaintCode;
        $this->TimingComplaint = $TimingComplaint;
        $this->OrderLineReference = $OrderLineReference;
        $this->DespatchLineReference = $DespatchLineReference;
        $this->DocumentReference = $DocumentReference;
        $this->Item = $Item;
        $this->Shipment = $Shipment;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReceivedQuantity) {
            $response[] = (string) $this->ReceivedQuantity;
        }
        if ($this->ShortQuantity) {
            $response[] = (string) $this->ShortQuantity;
        }
        if ($this->ShortageActionCode) {
            $response[] = (string) $this->ShortageActionCode;
        }
        if ($this->RejectedQuantity) {
            $response[] = (string) $this->RejectedQuantity;
        }
        if ($this->RejectReasonCode) {
            $response[] = (string) $this->RejectReasonCode;
        }
        if ($this->RejectReason) {
            foreach ($this->RejectReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->RejectActionCode) {
            $response[] = (string) $this->RejectActionCode;
        }
        if ($this->QuantityDiscrepancyCode) {
            $response[] = (string) $this->QuantityDiscrepancyCode;
        }
        if ($this->OversupplyQuantity) {
            $response[] = (string) $this->OversupplyQuantity;
        }
        if ($this->ReceivedDate) {
            $response[] = (string) $this->ReceivedDate;
        }
        if ($this->TimingComplaintCode) {
            $response[] = (string) $this->TimingComplaintCode;
        }
        if ($this->TimingComplaint) {
            $response[] = (string) $this->TimingComplaint;
        }
        if ($this->OrderLineReference) {
            $response[] = (string) $this->OrderLineReference;
        }
        if ($this->DespatchLineReference) {
            foreach ($this->DespatchLineReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DocumentReference) {
            foreach ($this->DocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Item) {
            foreach ($this->Item as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Shipment) {
            foreach ($this->Shipment as $elem) {
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
