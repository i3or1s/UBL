<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\PreviousPriceList;
use i3or1s\UBL\CAC\ValidityPeriod;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\StatusCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PriceListType.html.
 */
abstract class PriceListType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PriceListType';

    public readonly ?ID $ID; // [0..1]    An identifier for this price list.
    public readonly ?StatusCode $StatusCode; // [0..1]    A code signifying whether this price list is an original, copy, revision, or cancellation.
    /** @var ValidityPeriod[]|null */
    public readonly ?array $ValidityPeriod; // [0..*]    A period during which this price list is valid.
    public readonly ?PreviousPriceList $PreviousPriceList; // [0..1]    The previous price list.

    /**
     * @param ValidityPeriod[]|null $ValidityPeriod
     */
    public function __construct(?ID $ID, ?StatusCode $StatusCode, ?array $ValidityPeriod, ?PreviousPriceList $PreviousPriceList)
    {
        $this->ID = $ID;
        $this->StatusCode = $StatusCode;
        $this->ValidityPeriod = $ValidityPeriod;
        $this->PreviousPriceList = $PreviousPriceList;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->StatusCode) {
            $response[] = (string) $this->StatusCode;
        }
        if ($this->ValidityPeriod) {
            foreach ($this->ValidityPeriod as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PreviousPriceList) {
            $response[] = (string) $this->PreviousPriceList;
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
