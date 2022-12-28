<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Kemana\CustomerInterest\Api;

interface CustomerRegistrationManagementInterface
{
    const EMAIL = 'email';
    const FIRSTNAME = 'first_name';
    const LASTNAME = 'last_name';
    const PASSWORD = 'password';
    const MYINTEREST = 'my_interest';

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $cusEmail
     * @param string $cusPassword
     * @param string $myInterest
     * @return string
     */
    public function postCustomerRegistration($firstName, $lastName, $cusEmail, $cusPassword, $myInterest);

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set first name
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set last name
     *
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * Get email address
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email address
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Set password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password);

    /**
     * Get customer interest
     *
     * @return string $myInterest
     */
    public function getmyInterest();

    /**
     * Set customer interest
     *
     * @param string $myInterest
     * @return $this
     */
    public function setmyInterest($myInterest);
}
