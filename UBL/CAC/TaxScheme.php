<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CurrencyCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\TaxTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TaxScheme.html.
 */
final class TaxScheme implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:TaxScheme';

    public readonly ?ID $ID; // [0..1]    An identifier for this taxation scheme.
    public readonly ?Name $Name; // [0..1]    The name of this taxation scheme.
    public readonly ?TaxTypeCode $TaxTypeCode; // [0..1]    A code signifying the type of tax.
    public readonly ?CurrencyCode $CurrencyCode; // [0..1]    A code signifying the currency in which the tax is collected and reported.
    /** @var JurisdictionRegionAddress[]|null */
    public readonly ?array $JurisdictionRegionAddress; // [0..*]    A geographic area in which this taxation scheme applies.

    /**
     * @param JurisdictionRegionAddress[]|null $JurisdictionRegionAddress
     */
    public function __construct(?ID $ID, ?Name $Name, ?TaxTypeCode $TaxTypeCode, ?CurrencyCode $CurrencyCode, ?array $JurisdictionRegionAddress)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->TaxTypeCode = $TaxTypeCode;
        $this->CurrencyCode = $CurrencyCode;
        $this->JurisdictionRegionAddress = $JurisdictionRegionAddress;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->TaxTypeCode) {
            $response[] = (string) $this->TaxTypeCode;
        }
        if ($this->CurrencyCode) {
            $response[] = (string) $this->CurrencyCode;
        }
        if ($this->JurisdictionRegionAddress) {
            foreach ($this->JurisdictionRegionAddress as $elem) {
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
