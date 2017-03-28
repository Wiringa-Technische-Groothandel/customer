<?php

namespace WTG\Customer\Interfaces;

use Illuminate\Database\Eloquent\Collection;

/**
 * Company interface
 *
 * @package     WTG\Customer
 * @subpackage  Interfaces
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
interface CompanyInterface
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
     * Set the name of the company
     *
     * @param  string $name
     * @return $this
     */
    public function setName(string $name);

    /**
     * Get the name of the company
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set the company's active state
     *
     * @param  bool  $active
     * @return $this
     */
    public function setActive(bool $active);

    /**
     * Check if the company is active
     *
     * @return bool
     */
    public function getActive(): bool;

    /**
     * Set the customer number
     *
     * @param  string  $customerNumber
     * @return $this
     */
    public function setCustomerNumber(string $customerNumber);

    /**
     * Get the customer number
     *
     * @return string
     */
    public function getCustomerNumber(): string;

    /**
     * Get the associated customers
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCustomers(): Collection;
}