<?php

namespace WTG\Customer\Interfaces;

use Illuminate\Database\Eloquent\Builder;

/**
 * Favorite interface.
 *
 * @package     WTG\Customer
 * @subpackage  Interfaces
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
interface FavoriteInterface
{
    /**
     * Customer scope
     *
     * @param  Builder  $query
     * @param  string  $customerId
     * @return Builder
     */
    public function scopeCustomer(Builder $query, string $customerId): Builder;

    /**
     * Product scope
     *
     * @param  Builder  $query
     * @param  string  $productId
     * @return Builder
     */
    public function scopeProduct(Builder $query, string $productId): Builder;

    /**
     * Get the id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set the id
     *
     * @param  string  $id
     * @return $this
     */
    public function setId(string $id);

    /**
     * Get the product id.
     *
     * @return string
     */
    public function getProductId(): string;

    /**
     * Set the product id.
     *
     * @param  string  $id
     * @return $this
     */
    public function setProductId(string $id);

    /**
     * Get the customer id.
     *
     * @return string
     */
    public function getCustomerId(): string;

    /**
     * Set the customer id.
     *
     * @param  string  $id
     * @return $this
     */
    public function setCustomerId(string $id);

    /**
     * Add a product to a customer their favorites.
     *
     * @param  string  $customerId
     * @param  string  $productId
     * @return bool|FavoriteInterface
     */
    public function add(string $customerId, string $productId);
}