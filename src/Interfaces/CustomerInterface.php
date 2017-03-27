<?php

namespace WTG\Customer\Interfaces;

/**
 * Product interface
 *
 * @package     WTG\Customer
 * @subpackage  Interfaces
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
interface CustomerInterface
{
    /**
     * Get the product id
     *
     * @return string
     */
    public function getId();
}