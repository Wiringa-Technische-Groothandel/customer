<?php

namespace WTG\Customer\Interfaces;

use Illuminate\Database\Eloquent\Builder;
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
     * Company scope
     *
     * @param  Builder  $query
     * @param  string  $companyId
     * @return Builder
     */
    public function scopeCompany(Builder $query, string $companyId): Builder;

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
     * Get the company id
     *
     * @return string
     */
    public function getCompanyId(): string;

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

    /**
     * Check if the customer has admin rights
     *
     * @return bool
     */
    public function isAdmin(): bool;

    /**
     * Check if this model is the current user.
     *
     * @return bool
     */
    public function isCurrent(): bool;

    /**
     * Get is main
     *
     * @return bool
     */
    public function getIsMain(): bool;
    /**
     * Set is main
     *
     * @param  bool  $isMain
     * @return $this
     */
    public function setIsMain(bool $isMain);
}