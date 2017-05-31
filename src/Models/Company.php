<?php

namespace WTG\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use WTG\Customer\Interfaces\CompanyInterface;
use WTG\Customer\Interfaces\CustomerInterface;

/**
 * Company model
 *
 * @package     WTG\Customer
 * @subpackage  Models
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class Company extends Model implements CompanyInterface
{
    use SoftDeletes;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * Set the id
     *
     * @param  string  $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->attributes['id'] = $id;

        return $this;
    }

    /**
     * Get the id of the product
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    /**
     * Get the name of the company
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->attributes['name'] = $name;

        return $this;
    }

    /**
     * Get the name of the company
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->attributes['name'];
    }

    /**
     * Set the company's active state
     *
     * @param  bool  $active
     * @return $this
     */
    public function setActive(bool $active)
    {
        $this->attributes['active'] = $active;

        return $this;
    }

    /**
     * Check if the company is active
     *
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    /**
     * Set the company's admin state
     *
     * @param  bool  $admin
     * @return $this
     */
    public function setIsAdmin(bool $admin)
    {
        $this->attributes['is_admin'] = $admin;

        return $this;
    }

    /**
     * Check if the company is admin
     *
     * @return bool
     */
    public function getIsAdmin(): bool
    {
        return $this->attributes['is_admin'];
    }

    /**
     * Set the customer number
     *
     * @param  string  $customerNumber
     * @return $this
     */
    public function setCustomerNumber(string $customerNumber)
    {
        $this->attributes['customer_number'] = $customerNumber;

        return $this;
    }

    /**
     * Get the customer number
     *
     * @return string
     */
    public function getCustomerNumber(): string
    {
        return $this->attributes['customer_number'];
    }

    /**
     * Get the associated customers
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCustomers(): Collection
    {
        return app()->make(CustomerInterface::class)
            ->company($this->getId())
            ->get();
    }

    /**
     * Get the created at date.
     *
     * @param  string|null $format
     * @return string
     */
    public function getCreatedAt($format = null): string
    {
        return $this->getAttribute('created_at')->format($format);
    }
}