<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DeliveryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ContractualDelivery.html.
 */
final class ContractualDelivery extends DeliveryType
{
    protected const ELEMENT_SIGNATURE = 'cac:ContractualDelivery';
}
