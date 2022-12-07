<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\BatchQuantity;
use i3or1s\UBL\CBC\ConsumerUnitQuantity;
use i3or1s\UBL\CBC\HazardousRiskIndicator;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_DeliveryUnitType.html.
 */
abstract class DeliveryUnitType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:DeliveryUnitType';

    public readonly BatchQuantity $BatchQuantity; // [1..1]    The quantity of ordered Items that constitutes a batch for delivery purposes.
    public readonly ?ConsumerUnitQuantity $ConsumerUnitQuantity; // [0..1]    The quantity of units in the Delivery Unit expressed in the units used by the consumer.
    public readonly ?HazardousRiskIndicator $HazardousRiskIndicator; // [0..1]    An indication that the transported goods are subject to an international regulation concerning the carriage of dangerous goods (true) or not (false).

    public function __construct(BatchQuantity $BatchQuantity, ?ConsumerUnitQuantity $ConsumerUnitQuantity, ?HazardousRiskIndicator $HazardousRiskIndicator)
    {
        $this->BatchQuantity = $BatchQuantity;
        $this->ConsumerUnitQuantity = $ConsumerUnitQuantity;
        $this->HazardousRiskIndicator = $HazardousRiskIndicator;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->BatchQuantity;
        if ($this->ConsumerUnitQuantity) {
            $response[] = (string) $this->ConsumerUnitQuantity;
        }
        if ($this->HazardousRiskIndicator) {
            $response[] = (string) $this->HazardousRiskIndicator;
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
