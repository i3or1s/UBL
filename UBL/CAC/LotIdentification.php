<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ExpiryDate;
use i3or1s\UBL\CBC\LotNumberID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_LotIdentification.html.
 */
final class LotIdentification implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:LotIdentification';

    public readonly ?LotNumberID $LotNumberID; // [0..1]    An identifier for the lot.
    public readonly ?ExpiryDate $ExpiryDate; // [0..1]    The expiry date of the lot.
    /** @var AdditionalItemProperty[]|null */
    public readonly ?array $AdditionalItemProperty; // [0..*]    An additional property of the lot.

    /**
     * @param AdditionalItemProperty[]|null $AdditionalItemProperty
     */
    public function __construct(?LotNumberID $LotNumberID, ?ExpiryDate $ExpiryDate, ?array $AdditionalItemProperty)
    {
        $this->LotNumberID = $LotNumberID;
        $this->ExpiryDate = $ExpiryDate;
        $this->AdditionalItemProperty = $AdditionalItemProperty;
    }

    public function __toString()
    {
        $response = [];
        if ($this->LotNumberID) {
            $response[] = (string) $this->LotNumberID;
        }
        if ($this->ExpiryDate) {
            $response[] = (string) $this->ExpiryDate;
        }
        if ($this->AdditionalItemProperty) {
            foreach ($this->AdditionalItemProperty as $elem) {
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
