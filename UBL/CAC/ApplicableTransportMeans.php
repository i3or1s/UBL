<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportMeansType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ApplicableTransportMeans.html.
 */
final class ApplicableTransportMeans extends TransportMeansType
{
    protected const ELEMENT_SIGNATURE = 'cac:ApplicableTransportMeans';
}
