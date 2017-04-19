<?php

namespace WTG\Customer\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use WTG\Customer\Interfaces\CustomerInterface;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Customer model
 *
 * @package     WTG\Customer
 * @subpackage  Models
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class Customer extends Model implements AuthenticatableContract,
                                        AuthorizableContract,
                                        CanResetPasswordContract,
                                        CustomerInterface
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The company this customer belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function company()
    {
        return $this->belongsTo(Company::class);
    }

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
     * Get the associated company
     *
     * @return \WTG\Customer\Models\Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * Set the company id
     *
     * @param  string  $companyId
     * @return $this
     */
    public function setCompanyId(string $companyId)
    {
        $this->attributes['company_id'] = $companyId;

        return $this;
    }

    /**
     * Get the company id
     *
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->attributes['company_id'];
    }

    /**
     * Set the username
     *
     * @param  string  $username
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->attributes['username'] = $username;

        return $this;
    }

    /**
     * Get the username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->attributes['username'];
    }

    /**
     * Set the password
     *
     * @param  string  $password
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->attributes['password'] = $password;

        return $this;
    }

    /**
     * Get the password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    /**
     * Set the email
     *
     * @param  string  $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->attributes['email'] = $email;

        return $this;
    }

    /**
     * Get the email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    /**
     * Set the active state
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
     * Get the active state
     *
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    /**
     * Set the manager state
     *
     * @param  bool  $manager
     * @return $this
     */
    public function setManager(bool $manager)
    {
        $this->attributes['manager'] = $manager;

        return $this;
    }

    /**
     * Get the manager state
     *
     * @return bool
     */
    public function getManager(): bool
    {
        return $this->attributes['manager'];
    }

    /**
     * Check if the customer has admin rights
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        $company = $this->getCompany();

        if ($company !== null) {
            return $company->getIsAdmin();
        }

        return false;
    }

    /**
     * Check if this model is the current user.
     *
     * @return bool
     */
    public function isCurrent(): bool
    {
        return Auth::user()->getUsername() === $this->getUsername();
    }

    /**
     * Get is main
     *
     * @return bool
     */
    public function getIsMain(): bool
    {
        return $this->attributes['is_main'];
    }

    /**
     * Set is main
     *
     * @param  bool  $isMain
     * @return $this
     */
    public function setIsMain(bool $isMain)
    {
        $this->attributes['is_main'] = $isMain;

        return $this;
    }
}