<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CorporateRegistrationTypeCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CorporateRegistrationScheme.html.
 */
final class CorporateRegistrationScheme implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:CorporateRegistrationScheme';

    public readonly ?ID $ID; // [0..1]    An identifier for this registration scheme.
    public readonly ?Name $Name; // [0..1]    The name of this registration scheme.
    public readonly ?CorporateRegistrationTypeCode $CorporateRegistrationTypeCode; // [0..1]    A code signifying the type of this registration scheme.
    /** @var JurisdictionRegionAddress[]|null */
    public readonly ?array $JurisdictionRegionAddress; // [0..*]    A geographic area in which this registration scheme applies.

    /**
     * @param JurisdictionRegionAddress[]|null $JurisdictionRegionAddress
     */
    public function __construct(?ID $ID, ?Name $Name, ?CorporateRegistrationTypeCode $CorporateRegistrationTypeCode, ?array $JurisdictionRegionAddress)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->CorporateRegistrationTypeCode = $CorporateRegistrationTypeCode;
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
        if ($this->CorporateRegistrationTypeCode) {
            $response[] = (string) $this->CorporateRegistrationTypeCode;
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
