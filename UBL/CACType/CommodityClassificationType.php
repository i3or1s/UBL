<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\CargoTypeCode;
use i3or1s\UBL\CBC\CommodityCode;
use i3or1s\UBL\CBC\ItemClassificationCode;
use i3or1s\UBL\CBC\NatureCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_CommodityClassificationType.html.
 */
abstract class CommodityClassificationType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:CommodityClassificationType';

    public readonly ?NatureCode $NatureCode; // [0..1]    A code defined by a specific maintenance agency signifying the high-level nature of the commodity.
    public readonly ?CargoTypeCode $CargoTypeCode; // [0..1]    A mutually agreed code signifying the type of cargo for purposes of commodity classification.
    public readonly ?CommodityCode $CommodityCode; // [0..1]    The harmonized international commodity code for cross border and regulatory (customs and trade statistics) purposes.
    public readonly ?ItemClassificationCode $ItemClassificationCode; // [0..1]    A code signifying the trade classification of the commodity.

    public function __construct(?NatureCode $NatureCode, ?CargoTypeCode $CargoTypeCode, ?CommodityCode $CommodityCode, ?ItemClassificationCode $ItemClassificationCode)
    {
        $this->NatureCode = $NatureCode;
        $this->CargoTypeCode = $CargoTypeCode;
        $this->CommodityCode = $CommodityCode;
        $this->ItemClassificationCode = $ItemClassificationCode;
    }

    public function __toString()
    {
        $response = [];
        if ($this->NatureCode) {
            $response[] = (string) $this->NatureCode;
        }
        if ($this->CargoTypeCode) {
            $response[] = (string) $this->CargoTypeCode;
        }
        if ($this->CommodityCode) {
            $response[] = (string) $this->CommodityCode;
        }
        if ($this->ItemClassificationCode) {
            $response[] = (string) $this->ItemClassificationCode;
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
