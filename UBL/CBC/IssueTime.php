<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\TimeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_IssueTime.html
 * http://www.datypic.com/sc/xsd/t-xsd_time.html.
 */
final class IssueTime extends TimeType
{
    protected const ELEMENT_SIGNATURE = 'cbc:IssueTime';
}
