<?php

namespace i3or1s\UBL\CAC;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PricingReference.html.
 */
final class PricingReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PricingReference';

    public readonly ?OriginalItemLocationQuantity $OriginalItemLocationQuantity; // [0..1]    An original set of location-specific properties (e.g., price and quantity) associated with this item.
    /** @var AlternativeConditionPrice[]|null */
    public readonly ?array $AlternativeConditionPrice; // [0..*]    The price expressed in terms other than the actual price, e.g., the list price v. the contracted price, or the price in bags v. the price in kilos, or the list price in bags v. the contracted price in kilos.

    /**
     * @param AlternativeConditionPrice[]|null $AlternativeConditionPrice
     */
    public function __construct(?OriginalItemLocationQuantity $OriginalItemLocationQuantity, ?array $AlternativeConditionPrice)
    {
        $this->OriginalItemLocationQuantity = $OriginalItemLocationQuantity;
        $this->AlternativeConditionPrice = $AlternativeConditionPrice;
    }

    public function __toString()
    {
        $response = [];
        if ($this->OriginalItemLocationQuantity) {
            $response[] = (string) $this->OriginalItemLocationQuantity;
        }
        if ($this->AlternativeConditionPrice) {
            foreach ($this->AlternativeConditionPrice as $elem) {
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
