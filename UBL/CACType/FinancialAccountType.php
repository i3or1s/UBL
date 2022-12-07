<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Country;
use i3or1s\UBL\CAC\FinancialInstitutionBranch;
use i3or1s\UBL\CBC\AccountFormatCode;
use i3or1s\UBL\CBC\AccountTypeCode;
use i3or1s\UBL\CBC\AliasName;
use i3or1s\UBL\CBC\CurrencyCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\PaymentNote;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_FinancialAccountType.html.
 */
abstract class FinancialAccountType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:FinancialAccountType';

    public readonly ?ID $ID; // [0..1]    The identifier for this financial account; the bank account number.
    public readonly ?Name $Name; // [0..1]    The name of this financial account.
    public readonly ?AliasName $AliasName; // [0..1]    An alias for the name of this financial account, to be used in place of the actual account name for security reasons.
    public readonly ?AccountTypeCode $AccountTypeCode; // [0..1]    A code signifying the type of this financial account.
    public readonly ?AccountFormatCode $AccountFormatCode; // [0..1]    A code signifying the format of this financial account.
    public readonly ?CurrencyCode $CurrencyCode; // [0..1]    A code signifying the currency in which this financial account is held.
    /** @var PaymentNote[]|null */
    public readonly ?array $PaymentNote; // [0..*]    Free-form text applying to the Payment for the owner of this account.
    public readonly ?FinancialInstitutionBranch $FinancialInstitutionBranch; // [0..1]    The branch of the financial institution associated with this financial account.
    public readonly ?Country $Country; // [0..1]    The country in which the holder of the financial account is domiciled.

    /**
     * @param PaymentNote[]|null $PaymentNote
     */
    public function __construct(?ID $ID, ?Name $Name, ?AliasName $AliasName, ?AccountTypeCode $AccountTypeCode, ?AccountFormatCode $AccountFormatCode, ?CurrencyCode $CurrencyCode, ?array $PaymentNote, ?FinancialInstitutionBranch $FinancialInstitutionBranch, ?Country $Country)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->AliasName = $AliasName;
        $this->AccountTypeCode = $AccountTypeCode;
        $this->AccountFormatCode = $AccountFormatCode;
        $this->CurrencyCode = $CurrencyCode;
        $this->PaymentNote = $PaymentNote;
        $this->FinancialInstitutionBranch = $FinancialInstitutionBranch;
        $this->Country = $Country;
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
        if ($this->AliasName) {
            $response[] = (string) $this->AliasName;
        }
        if ($this->AccountTypeCode) {
            $response[] = (string) $this->AccountTypeCode;
        }
        if ($this->AccountFormatCode) {
            $response[] = (string) $this->AccountFormatCode;
        }
        if ($this->CurrencyCode) {
            $response[] = (string) $this->CurrencyCode;
        }
        if ($this->PaymentNote) {
            foreach ($this->PaymentNote as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FinancialInstitutionBranch) {
            $response[] = (string) $this->FinancialInstitutionBranch;
        }
        if ($this->Country) {
            $response[] = (string) $this->Country;
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
