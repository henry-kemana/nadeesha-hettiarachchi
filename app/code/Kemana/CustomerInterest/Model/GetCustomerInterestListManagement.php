<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Kemana\CustomerInterest\Model;

class GetCustomerInterestListManagement implements \Kemana\CustomerInterest\Api\GetCustomerInterestListManagementInterface
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetCustomerInterestList($storeCode = null, $path = null)
    {
        if ($storeCode === null) {
            $storeCode = $this->storeManager->getStore()->getCode();
        }
        $storeCode = 0;
        $path = 'general/interest_list/interests';
        $storeConfigCustomerInterestList = [];
        $storeConfigCustomerInterestList[][$path] = $this->scopeConfig
            ->getValue(
                $path,
                \Magento\Store\Model\ScopeInterface::SCOPE_STORES,
                $storeCode
            );
        return $storeConfigCustomerInterestList;
    }
}
