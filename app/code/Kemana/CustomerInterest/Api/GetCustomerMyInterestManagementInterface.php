<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Kemana\CustomerInterest\Api;

interface GetCustomerMyInterestManagementInterface
{

    /**
     * GET for getCustomerMyInterest api
     * @param string $customerId
     * @return string
     */
    public function getGetCustomerMyInterest($customerId);
}

