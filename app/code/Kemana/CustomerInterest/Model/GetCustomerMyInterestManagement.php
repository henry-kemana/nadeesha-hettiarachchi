<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Kemana\CustomerInterest\Model;

class GetCustomerMyInterestManagement implements \Kemana\CustomerInterest\Api\GetCustomerMyInterestManagementInterface
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $_customerRepositoryInterface;

    /**
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    /**
     * @param string $customerId
     * @return mixed|string
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getGetCustomerMyInterest($customerId)
    {
        $customer = $this->_customerRepositoryInterface->getById($customerId);
        $customAttributeInterest = $customer->getCustomAttribute('my_interest');
        return $customAttributeInterest->getValue();
    }
}
