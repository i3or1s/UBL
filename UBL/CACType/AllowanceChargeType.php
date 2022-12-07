<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\PaymentMeans;
use i3or1s\UBL\CAC\TaxCategory;
use i3or1s\UBL\CAC\TaxTotal;
use i3or1s\UBL\CBC\AccountingCost;
use i3or1s\UBL\CBC\AccountingCostCode;
use i3or1s\UBL\CBC\AllowanceChargeReason;
use i3or1s\UBL\CBC\AllowanceChargeReasonCode;
use i3or1s\UBL\CBC\Amount;
use i3or1s\UBL\CBC\BaseAmount;
use i3or1s\UBL\CBC\ChargeIndicator;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\MultiplierFactorNumeric;
use i3or1s\UBL\CBC\PerUnitAmount;
use i3or1s\UBL\CBC\PrepaidIndicator;
use i3or1s\UBL\CBC\SequenceNumeric;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_AllowanceChargeType.html.
 */
abstract class AllowanceChargeType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:AllowanceChargeType';

    public readonly ?ID $ID; // [0..1]    An identifier for this allowance or charge.
    public readonly ChargeIndicator $ChargeIndicator; // [1..1]    An indicator that this AllowanceCharge describes a charge (true) or a discount (false).
    public readonly ?AllowanceChargeReasonCode $AllowanceChargeReasonCode; // [0..1]    A mutually agreed code signifying the reason for this allowance or charge.
    /** @var AllowanceChargeReason[]|null */
    public readonly ?array $AllowanceChargeReason; // [0..*]    The reason for this allowance or charge.
    public readonly ?MultiplierFactorNumeric $MultiplierFactorNumeric; // [0..1]    A number by which the base amount is multiplied to calculate the actual amount of this allowance or charge.
    public readonly ?PrepaidIndicator $PrepaidIndicator; // [0..1]    An indicator that this allowance or charge is prepaid (true) or not (false).
    public readonly ?SequenceNumeric $SequenceNumeric; // [0..1]    A number indicating the order of this allowance or charge in the sequence of calculations applied when there are multiple allowances or charges.
    public readonly Amount $Amount; // [1..1]    The monetary amount of this allowance or charge to be applied.
    public readonly ?BaseAmount $BaseAmount; // [0..1]    The monetary amount to which the multiplier factor is applied in calculating the amount of this allowance or charge.
    public readonly ?AccountingCostCode $AccountingCostCode; // [0..1]    The accounting cost centre used by the buyer to account for this allowance or charge, expressed as a code.
    public readonly ?AccountingCost $AccountingCost; // [0..1]    The accounting cost centre used by the buyer to account for this allowance or charge, expressed as text.
    public readonly ?PerUnitAmount $PerUnitAmount; // [0..1]    The allowance or charge per item; the total allowance or charge is calculated by multiplying the per unit amount by the quantity of items, either at the level of the individual transaction line or for the total number of items in the document, depending on the context in which it appears.
    /** @var TaxCategory[]|null */
    public readonly ?array $TaxCategory; // [0..*]    A tax category applicable to this allowance or charge.
    public readonly ?TaxTotal $TaxTotal; // [0..1]    The total of all the taxes applicable to this allowance or charge.
    /** @var PaymentMeans[]|null */
    public readonly ?array $PaymentMeans; // [0..*]    A means of payment for this allowance or charge.

    /**
     * @param AllowanceChargeReason[]|null $AllowanceChargeReason
     * @param TaxCategory[]|null           $TaxCategory
     * @param PaymentMeans[]|null          $PaymentMeans
     */
    public function __construct(?ID $ID, ChargeIndicator $ChargeIndicator, ?AllowanceChargeReasonCode $AllowanceChargeReasonCode, ?array $AllowanceChargeReason, ?MultiplierFactorNumeric $MultiplierFactorNumeric, ?PrepaidIndicator $PrepaidIndicator, ?SequenceNumeric $SequenceNumeric, Amount $Amount, ?BaseAmount $BaseAmount, ?AccountingCostCode $AccountingCostCode, ?AccountingCost $AccountingCost, ?PerUnitAmount $PerUnitAmount, ?array $TaxCategory, ?TaxTotal $TaxTotal, ?array $PaymentMeans)
    {
        $this->ID = $ID;
        $this->ChargeIndicator = $ChargeIndicator;
        $this->AllowanceChargeReasonCode = $AllowanceChargeReasonCode;
        $this->AllowanceChargeReason = $AllowanceChargeReason;
        $this->MultiplierFactorNumeric = $MultiplierFactorNumeric;
        $this->PrepaidIndicator = $PrepaidIndicator;
        $this->SequenceNumeric = $SequenceNumeric;
        $this->Amount = $Amount;
        $this->BaseAmount = $BaseAmount;
        $this->AccountingCostCode = $AccountingCostCode;
        $this->AccountingCost = $AccountingCost;
        $this->PerUnitAmount = $PerUnitAmount;
        $this->TaxCategory = $TaxCategory;
        $this->TaxTotal = $TaxTotal;
        $this->PaymentMeans = $PaymentMeans;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        $response[] = (string) $this->ChargeIndicator;
        if ($this->AllowanceChargeReasonCode) {
            $response[] = (string) $this->AllowanceChargeReasonCode;
        }
        if ($this->AllowanceChargeReason) {
            foreach ($this->AllowanceChargeReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MultiplierFactorNumeric) {
            $response[] = (string) $this->MultiplierFactorNumeric;
        }
        if ($this->PrepaidIndicator) {
            $response[] = (string) $this->PrepaidIndicator;
        }
        if ($this->SequenceNumeric) {
            $response[] = (string) $this->SequenceNumeric;
        }
        $response[] = (string) $this->Amount;
        if ($this->BaseAmount) {
            $response[] = (string) $this->BaseAmount;
        }
        if ($this->AccountingCostCode) {
            $response[] = (string) $this->AccountingCostCode;
        }
        if ($this->AccountingCost) {
            $response[] = (string) $this->AccountingCost;
        }
        if ($this->PerUnitAmount) {
            $response[] = (string) $this->PerUnitAmount;
        }
        if ($this->TaxCategory) {
            foreach ($this->TaxCategory as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TaxTotal) {
            $response[] = (string) $this->TaxTotal;
        }
        if ($this->PaymentMeans) {
            foreach ($this->PaymentMeans as $elem) {
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
