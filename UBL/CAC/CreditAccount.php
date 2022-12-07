<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\AccountID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CreditAccount.html.
 */
final class CreditAccount implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:CreditAccount';

    public readonly AccountID $AccountID; // [1..1]    An identifier for this credit account.

    public function __construct(AccountID $AccountID)
    {
        $this->AccountID = $AccountID;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->AccountID;

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
