<?php
namespace Kemana\CustomerInterestGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CustomerInterest implements ResolverInterface
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     *
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
     * Customer my interest resolver
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
        if (!isset($args['cusId'])) {
            throw new GraphQlInputException(__('Invalid parameter list.'));
        }
        $output = [];
        $output['myInterest'] = $args['cusId'];

        $customer = $this->_customerRepositoryInterface->getById($args['cusId']);
        $customAttributeInterest = $customer->getCustomAttribute('my_interest');
        $output['myInterest'] = $customAttributeInterest->getValue();
        return $output;
    }
}
