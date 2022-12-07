<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Quantity;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_GoodsItemContainer.html.
 */
final class GoodsItemContainer implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:GoodsItemContainer';

    public readonly ID $ID; // [1..1]    An identifier for this goods item container.
    public readonly ?Quantity $Quantity; // [0..1]    The number of goods items loaded into or onto one piece of transport equipment as a total consignment or part of a consignment.
    /** @var TransportEquipment[]|null */
    public readonly ?array $TransportEquipment; // [0..*]    A piece of transport equipment used to contain a single goods item.

    /**
     * @param TransportEquipment[]|null $TransportEquipment
     */
    public function __construct(ID $ID, ?Quantity $Quantity, ?array $TransportEquipment)
    {
        $this->ID = $ID;
        $this->Quantity = $Quantity;
        $this->TransportEquipment = $TransportEquipment;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->Quantity) {
            $response[] = (string) $this->Quantity;
        }
        if ($this->TransportEquipment) {
            foreach ($this->TransportEquipment as $elem) {
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
