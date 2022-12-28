<?php
namespace Kemana\CustomerInterestGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CustomerInterestList implements ResolverInterface
{
    /**
     * @var \Kemana\CustomerInterest\Model\GetCustomerInterestListManagement
     */
    protected $customerInterestList;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Kemana\CustomerInterest\Model\GetCustomerInterestListManagement $customerInterestList
     */
    public function __construct(
        \Kemana\CustomerInterest\Model\GetCustomerInterestListManagement $customerInterestList
    ) {
        $this->customerInterestList = $customerInterestList;
    }

    /**
     * Customer interest list resolver
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|\Magento\Framework\GraphQl\Query\Resolver\Value|mixed
     * @throws GraphQlInputException
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $output = [];
        $output['interestList']= $this->customerInterestList->getGetCustomerInterestList($storeCode = null, $path = null);

        return $output;
    }
}
