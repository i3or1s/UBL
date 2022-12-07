<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\DocumentReference;
use i3or1s\UBL\CAC\Item;
use i3or1s\UBL\CAC\OrderLineReference;
use i3or1s\UBL\CAC\Shipment;
use i3or1s\UBL\CBC\BackorderQuantity;
use i3or1s\UBL\CBC\BackorderReason;
use i3or1s\UBL\CBC\DeliveredQuantity;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\LineStatusCode;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\OutstandingQuantity;
use i3or1s\UBL\CBC\OutstandingReason;
use i3or1s\UBL\CBC\OversupplyQuantity;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_DespatchLineType.html.
 */
abstract class DespatchLineType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:DespatchLineType';

    public readonly ID $ID; // [1..1]    An identifier for this despatch line.
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this despatch line.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures.
    public readonly ?LineStatusCode $LineStatusCode; // [0..1]    A code signifying the status of this despatch line with respect to its original state.
    public readonly ?DeliveredQuantity $DeliveredQuantity; // [0..1]    The quantity despatched (picked up).
    public readonly ?BackorderQuantity $BackorderQuantity; // [0..1]    The quantity on back order at the supplier.
    /** @var BackorderReason[]|null */
    public readonly ?array $BackorderReason; // [0..*]    The reason for the back order.
    public readonly ?OutstandingQuantity $OutstandingQuantity; // [0..1]    The quantity outstanding (which will follow in a later despatch).
    /** @var OutstandingReason[]|null */
    public readonly ?array $OutstandingReason; // [0..*]    The reason for the outstanding quantity.
    public readonly ?OversupplyQuantity $OversupplyQuantity; // [0..1]    The quantity over-supplied, i.e., the quantity over and above that ordered.
    /** @var OrderLineReference[] */
    public readonly array $OrderLineReference; // [1..*]    A reference to an order line associated with this despatch line.
    /** @var DocumentReference[]|null */
    public readonly ?array $DocumentReference; // [0..*]    A reference to a document associated with this despatch line.
    public readonly Item $Item; // [1..1]    The item associated with this despatch line.
    /** @var Shipment[]|null */
    public readonly ?array $Shipment; // [0..*]    A shipment associated with this despatch line.

    /**
     * @param Note[]|null              $Note
     * @param BackorderReason[]|null   $BackorderReason
     * @param OutstandingReason[]|null $OutstandingReason
     * @param OrderLineReference[]     $OrderLineReference
     * @param DocumentReference[]|null $DocumentReference
     * @param Shipment[]|null          $Shipment
     */
    public function __construct(ID $ID, ?UUID $UUID, ?array $Note, ?LineStatusCode $LineStatusCode, ?DeliveredQuantity $DeliveredQuantity, ?BackorderQuantity $BackorderQuantity, ?array $BackorderReason, ?OutstandingQuantity $OutstandingQuantity, ?array $OutstandingReason, ?OversupplyQuantity $OversupplyQuantity, array $OrderLineReference, ?array $DocumentReference, Item $Item, ?array $Shipment)
    {
        $this->ID = $ID;
        $this->UUID = $UUID;
        $this->Note = $Note;
        $this->LineStatusCode = $LineStatusCode;
        $this->DeliveredQuantity = $DeliveredQuantity;
        $this->BackorderQuantity = $BackorderQuantity;
        $this->BackorderReason = $BackorderReason;
        $this->OutstandingQuantity = $OutstandingQuantity;
        $this->OutstandingReason = $OutstandingReason;
        $this->OversupplyQuantity = $OversupplyQuantity;
        $this->OrderLineReference = $OrderLineReference;
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
        if ($this->LineStatusCode) {
            $response[] = (string) $this->LineStatusCode;
        }
        if ($this->DeliveredQuantity) {
            $response[] = (string) $this->DeliveredQuantity;
        }
        if ($this->BackorderQuantity) {
            $response[] = (string) $this->BackorderQuantity;
        }
        if ($this->BackorderReason) {
            foreach ($this->BackorderReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OutstandingQuantity) {
            $response[] = (string) $this->OutstandingQuantity;
        }
        if ($this->OutstandingReason) {
            foreach ($this->OutstandingReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OversupplyQuantity) {
            $response[] = (string) $this->OversupplyQuantity;
        }
        foreach ($this->OrderLineReference as $elem) {
            $response[] = (string) $elem;
        }

        if ($this->DocumentReference) {
            foreach ($this->DocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        $response[] = (string) $this->Item;
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
