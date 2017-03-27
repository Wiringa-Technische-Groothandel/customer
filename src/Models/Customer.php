<?php

namespace WTG\Customer\Models;

use Illuminate\Auth\Authenticatable;
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
     * Get the id of the product
     *
     * @return int
     */
    public function getId()
    {
        return $this->attributes['id'];
    }
}