<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\ServiceType;
use i3or1s\UBL\CBC\ServiceTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ServiceProviderParty.html.
 */
final class ServiceProviderParty implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ServiceProviderParty';

    public readonly ?ID $ID; // [0..1]    An identifier for this service provider.
    public readonly ?ServiceTypeCode $ServiceTypeCode; // [0..1]    The type of service provided, expressed as a code.
    /** @var ServiceType[]|null */
    public readonly ?array $ServiceType; // [0..*]    The type of service provided, expressed as text.
    public readonly ?Party $Party; // [1..1]    The party providing the service.
    public readonly ?SellerContact $SellerContact; // [0..1]    The contact for the service provider.

    /**
     * @param ServiceType[]|null $ServiceType
     */
    public function __construct(?ID $ID, ?ServiceTypeCode $ServiceTypeCode, ?array $ServiceType, ?Party $Party, ?SellerContact $SellerContact)
    {
        $this->ID = $ID;
        $this->ServiceTypeCode = $ServiceTypeCode;
        $this->ServiceType = $ServiceType;
        $this->Party = $Party;
        $this->SellerContact = $SellerContact;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->ServiceTypeCode) {
            $response[] = (string) $this->ServiceTypeCode;
        }
        if ($this->ServiceType) {
            foreach ($this->ServiceType as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Party) {
            $response[] = (string) $this->Party;
        }
        if ($this->SellerContact) {
            $response[] = (string) $this->SellerContact;
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
