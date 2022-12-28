<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Kemana\CustomerInterest\Api;

interface GetCustomerInterestListManagementInterface
{

    /**
     * GET for getCustomerInterestList api
     * @param string $storeCode
     * @param string $path
     * @return array
     */
    public function getGetCustomerInterestList($storeCode =null ,$path = null);
}
