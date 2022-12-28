<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Kemana\CustomerInterest\Model;

class CustomerRegistrationManagement implements \Kemana\CustomerInterest\Api\CustomerRegistrationManagementInterface
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    protected $customerFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Customer\Model\CustomerFactory $customerFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface       $storeManager,
        \Magento\Customer\Model\CustomerFactory          $customerFactory,
        array                                            $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->customerFactory = $customerFactory;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $cusEmail
     * @param string $cusPassword
     * @param string $myInterest
     * @return string
     */
    public function postCustomerRegistration($firstName, $lastName, $cusEmail, $cusPassword, $myInterest)
    {
        $store = $this->storeManager->getStore();
        $storeId = $store->getStoreId();
        $websiteId = $this->storeManager->getStore()->getWebsiteId();
        $customer = $this->customerFactory->create();
        $customer->setWebsiteId($websiteId);
        $customer->loadByEmail($cusEmail);
        if (!$customer->getId()) {
            $customer->setWebsiteId($websiteId)
                ->setStore($store)
                ->setFirstname($firstName)
                ->setLastname($lastName)
                ->setEmail($cusEmail)
                ->setPassword($cusPassword)
                ->setmyInterest($myInterest);
            $customer->save();

            return 'created customer ' . $firstName . " " . $lastName;
        }
    }

    /**
     * Get email address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->_get(self::FIRSTNAME);
    }

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->_get(self::LASTNAME);
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->_get(self::PASSWORD);
    }

    /**
     * Get customer interest
     *
     * @return string
     */
    public function getmyInterest()
    {
        return $this->_get(self::MYINTEREST);
    }

    /**
     * Set email address
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Set first name
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * Set last name
     *
     * @param string $lastname
     * @return string
     */
    public function setLastname($lastname)
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * Set password
     *
     * @param string $lastname
     * @return string
     */
    public function setPassword($password)
    {
        return $this->setData(self::PASSWORD, $password);
    }

    /**
     * Set customer interest
     *
     * @param string $myInterest
     * @return string
     */
    public function setmyInterest($myInterest)
    {
        return $this->setData(self::MYINTEREST, $myInterest);
    }
}
