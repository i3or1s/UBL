<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ApplicableAddress;
use i3or1s\UBL\CBC\Information;
use i3or1s\UBL\CBC\Reference;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TradingTermsType.html.
 */
abstract class TradingTermsType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TradingTermsType';

    /** @var Information[]|null */
    public readonly ?array $Information; // [0..*]    Text describing the terms of a trade agreement.
    public readonly ?Reference $Reference; // [0..1]    A reference quoting the basis of the terms
    public readonly ?ApplicableAddress $ApplicableAddress; // [0..1]    The address at which these trading terms apply.

    /**
     * @param Information[]|null $Information
     */
    public function __construct(?array $Information, ?Reference $Reference, ?ApplicableAddress $ApplicableAddress)
    {
        $this->Information = $Information;
        $this->Reference = $Reference;
        $this->ApplicableAddress = $ApplicableAddress;
    }

    public function __toString()
    {
        $response = [];
        if ($this->Information) {
            foreach ($this->Information as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Reference) {
            $response[] = (string) $this->Reference;
        }
        if ($this->ApplicableAddress) {
            $response[] = (string) $this->ApplicableAddress;
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
