<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ForeignExchangeContract;
use i3or1s\UBL\CBC\CalculationRate;
use i3or1s\UBL\CBC\Date;
use i3or1s\UBL\CBC\ExchangeMarketID;
use i3or1s\UBL\CBC\MathematicOperatorCode;
use i3or1s\UBL\CBC\SourceCurrencyBaseRate;
use i3or1s\UBL\CBC\SourceCurrencyCode;
use i3or1s\UBL\CBC\TargetCurrencyBaseRate;
use i3or1s\UBL\CBC\TargetCurrencyCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ExchangeRateType.html.
 */
abstract class ExchangeRateType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ExchangeRateType';

    public readonly SourceCurrencyCode $SourceCurrencyCode; // [1..1]    The reference currency for this exchange rate; the currency from which the exchange is being made.
    public readonly ?SourceCurrencyBaseRate $SourceCurrencyBaseRate; // [0..1]    In the case of a source currency with denominations of small value, the unit base.
    public readonly TargetCurrencyCode $TargetCurrencyCode; // [1..1]    The target currency for this exchange rate; the currency to which the exchange is being made.
    public readonly ?TargetCurrencyBaseRate $TargetCurrencyBaseRate; // [0..1]    In the case of a target currency with denominations of small value, the unit base.
    public readonly ?ExchangeMarketID $ExchangeMarketID; // [0..1]    An identifier for the currency exchange market used as the source of this exchange rate.
    public readonly ?CalculationRate $CalculationRate; // [0..1]    The factor applied to the source currency to calculate the target currency.
    public readonly ?MathematicOperatorCode $MathematicOperatorCode; // [0..1]    A code signifying whether the calculation rate is a multiplier or a divisor.
    public readonly ?Date $Date; // [0..1]    The date on which the exchange rate was established.
    public readonly ?ForeignExchangeContract $ForeignExchangeContract; // [0..1]    A contract for foreign exchange.

    public function __construct(SourceCurrencyCode $SourceCurrencyCode, ?SourceCurrencyBaseRate $SourceCurrencyBaseRate, TargetCurrencyCode $TargetCurrencyCode, ?TargetCurrencyBaseRate $TargetCurrencyBaseRate, ?ExchangeMarketID $ExchangeMarketID, ?CalculationRate $CalculationRate, ?MathematicOperatorCode $MathematicOperatorCode, ?Date $Date, ?ForeignExchangeContract $ForeignExchangeContract)
    {
        $this->SourceCurrencyCode = $SourceCurrencyCode;
        $this->SourceCurrencyBaseRate = $SourceCurrencyBaseRate;
        $this->TargetCurrencyCode = $TargetCurrencyCode;
        $this->TargetCurrencyBaseRate = $TargetCurrencyBaseRate;
        $this->ExchangeMarketID = $ExchangeMarketID;
        $this->CalculationRate = $CalculationRate;
        $this->MathematicOperatorCode = $MathematicOperatorCode;
        $this->Date = $Date;
        $this->ForeignExchangeContract = $ForeignExchangeContract;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->SourceCurrencyCode;
        if ($this->SourceCurrencyBaseRate) {
            $response[] = (string) $this->SourceCurrencyBaseRate;
        }
        $response[] = (string) $this->TargetCurrencyCode;
        if ($this->TargetCurrencyBaseRate) {
            $response[] = (string) $this->TargetCurrencyBaseRate;
        }
        if ($this->ExchangeMarketID) {
            $response[] = (string) $this->ExchangeMarketID;
        }
        if ($this->CalculationRate) {
            $response[] = (string) $this->CalculationRate;
        }
        if ($this->MathematicOperatorCode) {
            $response[] = (string) $this->MathematicOperatorCode;
        }
        if ($this->Date) {
            $response[] = (string) $this->Date;
        }
        if ($this->ForeignExchangeContract) {
            $response[] = (string) $this->ForeignExchangeContract;
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
