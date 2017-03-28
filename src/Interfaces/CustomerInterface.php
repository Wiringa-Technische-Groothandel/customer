<?php

namespace WTG\Customer\Interfaces;

use WTG\Customer\Models\Company;

/**
 * Customer interface
 *
 * @package     WTG\Customer
 * @subpackage  Interfaces
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
interface CustomerInterface
{
    /**
     * Set the id
     *
     * @param  string  $id
     * @return $this
     */
    public function setId(string $id);

    /**
     * Get the product id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get the associated company
     *
     * @return \WTG\Customer\Models\Company
     */
    public function getCompany(): Company;

    /**
     * Set the company id
     *
     * @param  string  $companyId
     * @return $this
     */
    public function setCompanyId(string $companyId);

    /**
     * Set the username
     *
     * @param  string  $username
     * @return $this
     */
    public function setUsername(string $username);

    /**
     * Get the username
     *
     * @return string
     */
    public function getUsername(): string;

    /**
     * Set the username
     *
     * @param  string  $password
     * @return $this
     */
    public function setPassword(string $password);

    /**
     * Get the password
     *
     * @return string
     */
    public function getPassword(): string;

    /**
     * Set the email
     *
     * @param  string  $email
     * @return $this
     */
    public function setEmail(string $email);

    /**
     * Get the email
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Set the active state
     *
     * @param  bool  $active
     * @return $this
     */
    public function setActive(bool $active);

    /**
     * Get the active state
     *
     * @return bool
     */
    public function getActive(): bool;

    /**
     * Set the manager state
     *
     * @param  bool  $manager
     * @return $this
     */
    public function setManager(bool $manager);

    /**
     * Get the manager state
     *
     * @return bool
     */
    public function getManager(): bool;
}