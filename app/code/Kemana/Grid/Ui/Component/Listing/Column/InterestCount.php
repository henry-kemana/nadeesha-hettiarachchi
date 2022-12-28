<?php
namespace Kemana\Grid\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class InterestCount extends Column
{
    /**
     * @var Kemana\CustomerInterest\Model\GetCustomerInterestListManagement
     */
    protected $customerInterest;

    /**
     * Escaper
     *
     * @var \Magento\Framework\Escaper
     */
    protected $escaper;

    /**
     * System store
     *
     * @var SystemStore
     */
    protected $systemStore;

    /**
     * Constructor
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Escaper $escaper
     * @param \Kemana\CustomerInterest\Model\GetCustomerInterestListManagement $customerInterest
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Escaper $escaper,
        \Kemana\CustomerInterest\Model\GetCustomerInterestListManagement $customerInterest,
        array $components = [],
        array $data = []
    ) {
        $this->escaper = $escaper;
        $this->customerInterest = $customerInterest;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $interest = $this->customerInterest->getGetCustomerInterestList($storeCode =null, $path = null);
            $customerInterestList = json_decode($interest[0]['general/interest_list/interests'], true);
            $arrayKeys = (array_keys($customerInterestList));
            $customerInterest = [];
            foreach ($arrayKeys as $interest) {
                $customerInterest[] = $customerInterestList[$interest]['interest'];
            }

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $customerObj = $objectManager->create('Magento\Customer\Model\ResourceModel\Customer\Collection');

            foreach ($customerInterest as $interest) {
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $customerObj = $objectManager->create('Magento\Customer\Model\ResourceModel\Customer\Collection');
                $customerCollection = $customerObj->addAttributeToSelect('*')
                    ->addAttributeToFilter('my_interest', $interest)
                    ->load();
                $numberOfCustomers[] = $customerCollection->count();
            }
            $i=0;
            foreach ($dataSource['data']['items'] as & $item) {
                if ($i<= count($customerInterest)-1) {
                    $item[$this->getData('name')] = $numberOfCustomers[$i];
                }
                $i++;
            }
        }

        return $dataSource;
    }
}
