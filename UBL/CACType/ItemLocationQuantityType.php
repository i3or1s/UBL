<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AllowanceCharge;
use i3or1s\UBL\CAC\ApplicableTaxCategory;
use i3or1s\UBL\CAC\ApplicableTerritoryAddress;
use i3or1s\UBL\CAC\DeliveryUnit;
use i3or1s\UBL\CAC\DependentPriceReference;
use i3or1s\UBL\CAC\Package;
use i3or1s\UBL\CAC\Price;
use i3or1s\UBL\CBC\HazardousRiskIndicator;
use i3or1s\UBL\CBC\LeadTimeMeasure;
use i3or1s\UBL\CBC\MaximumQuantity;
use i3or1s\UBL\CBC\MinimumQuantity;
use i3or1s\UBL\CBC\TradingRestrictions;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ItemLocationQuantityType.html.
 */
abstract class ItemLocationQuantityType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ItemLocationQuantityType';

    public readonly ?LeadTimeMeasure $LeadTimeMeasure; // [0..1]    The lead time, i.e., the time taken from the time at which an item is ordered to the time of its delivery.
    public readonly ?MinimumQuantity $MinimumQuantity; // [0..1]    The minimum quantity that can be ordered to qualify for a specific price.
    public readonly ?MaximumQuantity $MaximumQuantity; // [0..1]    The maximum quantity that can be ordered to qualify for a specific price.
    public readonly ?HazardousRiskIndicator $HazardousRiskIndicator; // [0..1]    An indication that the transported item, as delivered, in the stated quantity to the stated location, is subject to an international regulation concerning the carriage of dangerous goods (true) or not (false).
    /** @var TradingRestrictions[]|null */
    public readonly ?array $TradingRestrictions; // [0..*]    Text describing trade restrictions on the quantity of this item or on the item itself.
    /** @var ApplicableTerritoryAddress[]|null */
    public readonly ?array $ApplicableTerritoryAddress; // [0..*]    The applicable sales territory.
    public readonly ?Price $Price; // [0..1]    The price associated with the given location.
    /** @var DeliveryUnit[]|null */
    public readonly ?array $DeliveryUnit; // [0..*]    A delivery unit in which the item is located.
    /** @var ApplicableTaxCategory[]|null */
    public readonly ?array $ApplicableTaxCategory; // [0..*]    A tax category applicable to this item location quantity.
    public readonly ?Package $Package; // [0..1]    The package to which this price applies.
    /** @var AllowanceCharge[]|null */
    public readonly ?array $AllowanceCharge; // [0..*]    An allowance or charge associated with this item location quantity.
    public readonly ?DependentPriceReference $DependentPriceReference; // [0..1]    The price of the item as a percentage of the price of some other item.

    /**
     * @param TradingRestrictions[]|null        $TradingRestrictions
     * @param ApplicableTerritoryAddress[]|null $ApplicableTerritoryAddress
     * @param DeliveryUnit[]|null               $DeliveryUnit
     * @param ApplicableTaxCategory[]|null      $ApplicableTaxCategory
     * @param AllowanceCharge[]|null            $AllowanceCharge
     */
    public function __construct(?LeadTimeMeasure $LeadTimeMeasure, ?MinimumQuantity $MinimumQuantity, ?MaximumQuantity $MaximumQuantity, ?HazardousRiskIndicator $HazardousRiskIndicator, ?array $TradingRestrictions, ?array $ApplicableTerritoryAddress, ?Price $Price, ?array $DeliveryUnit, ?array $ApplicableTaxCategory, ?Package $Package, ?array $AllowanceCharge, ?DependentPriceReference $DependentPriceReference)
    {
        $this->LeadTimeMeasure = $LeadTimeMeasure;
        $this->MinimumQuantity = $MinimumQuantity;
        $this->MaximumQuantity = $MaximumQuantity;
        $this->HazardousRiskIndicator = $HazardousRiskIndicator;
        $this->TradingRestrictions = $TradingRestrictions;
        $this->ApplicableTerritoryAddress = $ApplicableTerritoryAddress;
        $this->Price = $Price;
        $this->DeliveryUnit = $DeliveryUnit;
        $this->ApplicableTaxCategory = $ApplicableTaxCategory;
        $this->Package = $Package;
        $this->AllowanceCharge = $AllowanceCharge;
        $this->DependentPriceReference = $DependentPriceReference;
    }

    public function __toString()
    {
        $response = [];
        if ($this->LeadTimeMeasure) {
            $response[] = (string) $this->LeadTimeMeasure;
        }
        if ($this->MinimumQuantity) {
            $response[] = (string) $this->MinimumQuantity;
        }
        if ($this->MaximumQuantity) {
            $response[] = (string) $this->MaximumQuantity;
        }
        if ($this->HazardousRiskIndicator) {
            $response[] = (string) $this->HazardousRiskIndicator;
        }
        if ($this->TradingRestrictions) {
            foreach ($this->TradingRestrictions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ApplicableTerritoryAddress) {
            foreach ($this->ApplicableTerritoryAddress as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Price) {
            $response[] = (string) $this->Price;
        }
        if ($this->DeliveryUnit) {
            foreach ($this->DeliveryUnit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ApplicableTaxCategory) {
            foreach ($this->ApplicableTaxCategory as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Package) {
            $response[] = (string) $this->Package;
        }
        if ($this->AllowanceCharge) {
            foreach ($this->AllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DependentPriceReference) {
            $response[] = (string) $this->DependentPriceReference;
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
