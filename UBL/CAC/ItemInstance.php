<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\BestBeforeDate;
use i3or1s\UBL\CBC\ManufactureDate;
use i3or1s\UBL\CBC\ManufactureTime;
use i3or1s\UBL\CBC\ProductTraceID;
use i3or1s\UBL\CBC\RegistrationID;
use i3or1s\UBL\CBC\SerialID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ItemInstance.html.
 */
final class ItemInstance implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ItemInstance';

    public readonly ?ProductTraceID $ProductTraceID; // [0..1]    An identifier used for tracing this item instance, such as the EPC number used in RFID.
    public readonly ?ManufactureDate $ManufactureDate; // [0..1]    The date on which this item instance was manufactured.
    public readonly ?ManufactureTime $ManufactureTime; // [0..1]    The time at which this item instance was manufactured.
    public readonly ?BestBeforeDate $BestBeforeDate; // [0..1]    The date before which it is best to use this item instance.
    public readonly ?RegistrationID $RegistrationID; // [0..1]    The registration identifier of this item instance.
    public readonly ?SerialID $SerialID; // [0..1]    The serial number of this item instance.
    /** @var AdditionalItemProperty[]|null */
    public readonly ?array $AdditionalItemProperty; // [0..*]    An additional property of this item instance.
    public readonly ?LotIdentification $LotIdentification; // [0..1]    The lot identifier of this item instance (the identifier that allows recall of the item if necessary).

    /**
     * @param AdditionalItemProperty[]|null $AdditionalItemProperty
     */
    public function __construct(?ProductTraceID $ProductTraceID, ?ManufactureDate $ManufactureDate, ?ManufactureTime $ManufactureTime, ?BestBeforeDate $BestBeforeDate, ?RegistrationID $RegistrationID, ?SerialID $SerialID, ?array $AdditionalItemProperty, ?LotIdentification $LotIdentification)
    {
        $this->ProductTraceID = $ProductTraceID;
        $this->ManufactureDate = $ManufactureDate;
        $this->ManufactureTime = $ManufactureTime;
        $this->BestBeforeDate = $BestBeforeDate;
        $this->RegistrationID = $RegistrationID;
        $this->SerialID = $SerialID;
        $this->AdditionalItemProperty = $AdditionalItemProperty;
        $this->LotIdentification = $LotIdentification;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ProductTraceID) {
            $response[] = (string) $this->ProductTraceID;
        }
        if ($this->ManufactureDate) {
            $response[] = (string) $this->ManufactureDate;
        }
        if ($this->ManufactureTime) {
            $response[] = (string) $this->ManufactureTime;
        }
        if ($this->BestBeforeDate) {
            $response[] = (string) $this->BestBeforeDate;
        }
        if ($this->RegistrationID) {
            $response[] = (string) $this->RegistrationID;
        }
        if ($this->SerialID) {
            $response[] = (string) $this->SerialID;
        }
        if ($this->AdditionalItemProperty) {
            foreach ($this->AdditionalItemProperty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->LotIdentification) {
            $response[] = (string) $this->LotIdentification;
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
